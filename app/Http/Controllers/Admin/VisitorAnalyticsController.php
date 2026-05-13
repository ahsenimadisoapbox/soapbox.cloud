<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorPageVisit;
use App\Models\VisitorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorAnalyticsController extends Controller
{
    public function index(Request $request)
    {
        /* ── Period ── */
        $days = (int) $request->input('days', 30);
        $days = in_array($days, [7, 30, 90], true) ? $days : 30;
        $from = now()->subDays($days);

        /* ── Additional filters ── */
        $deviceFilter  = $request->input('device');   // desktop|mobile|tablet
        $countryFilter = strtoupper(trim($request->input('country', '')));
        $pageFilter    = $request->input('page');

        /* ── Base visits query (with filters) ── */
        $visitsQuery = VisitorPageVisit::query()
            ->with('session')
            ->where('started_at', '>=', $from);

        if ($deviceFilter) {
            $visitsQuery->whereHas('session', fn ($q) =>
                $q->where('device_type', $deviceFilter)
            );
        }

        if ($countryFilter) {
            $visitsQuery->whereHas('session', fn ($q) =>
                $q->where('country_code', $countryFilter)
            );
        }

        if ($pageFilter) {
            $visitsQuery->where('page_path', 'like', '%' . $pageFilter . '%');
        }

        /* ── KPI Metrics ── */
        $totalPageViews  = (clone $visitsQuery)->count();
        $uniqueVisitors  = (clone $visitsQuery)->distinct('visitor_session_id')->count('visitor_session_id');
        $averageDuration = (int) round((clone $visitsQuery)->avg('duration_seconds') ?? 0);
        $activeToday     = VisitorSession::whereDate('last_seen_at', today())->count();

        /* ── Top Pages ── */
        $topPages = (clone $visitsQuery)
            ->select(
                'page_path',
                DB::raw('count(*) as views'),
                DB::raw('avg(duration_seconds) as avg_duration')
            )
            ->groupBy('page_path')
            ->orderByDesc('views')
            ->take(10)
            ->get();

        /* ── Device Breakdown ── */
        $deviceBreakdown = VisitorSession::query()
            ->where('last_seen_at', '>=', $from)
            ->when($countryFilter, fn ($q) => $q->where('country_code', $countryFilter))
            ->select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get();

        /* ── Browser Breakdown ── */
        $browserBreakdown = VisitorSession::query()
            ->where('last_seen_at', '>=', $from)
            ->when($deviceFilter,  fn ($q) => $q->where('device_type',  $deviceFilter))
            ->when($countryFilter, fn ($q) => $q->where('country_code', $countryFilter))
            ->whereNotNull('browser')
            ->select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->orderByDesc('total')
            ->take(8)
            ->get();

        /* ── Country Breakdown ── */
        $countryBreakdown = VisitorSession::query()
            ->where('last_seen_at', '>=', $from)
            ->when($deviceFilter, fn ($q) => $q->where('device_type', $deviceFilter))
            ->whereNotNull('country_code')
            ->select('country_code', DB::raw('count(*) as total'))
            ->groupBy('country_code')
            ->orderByDesc('total')
            ->take(8)
            ->get();

        /* ── Daily Traffic (for line chart) ── */
        $dailyTraffic = VisitorPageVisit::query()
            ->where('started_at', '>=', $from)
            ->when($deviceFilter, fn ($q) =>
                $q->whereHas('session', fn ($s) => $s->where('device_type', $deviceFilter))
            )
            ->when($countryFilter, fn ($q) =>
                $q->whereHas('session', fn ($s) => $s->where('country_code', $countryFilter))
            )
            ->when($pageFilter, fn ($q) =>
                $q->where('page_path', 'like', '%' . $pageFilter . '%')
            )
            ->select(
                DB::raw('DATE(started_at) as date'),
                DB::raw('count(*) as views'),
                DB::raw('count(distinct visitor_session_id) as visitors')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn ($row) => [
                'date'     => $row->date,
                'views'    => (int) $row->views,
                'visitors' => (int) $row->visitors,
            ]);

        /* ── Hourly Distribution (for bar chart) ── */
        $hourlyDistribution = VisitorPageVisit::query()
            ->where('started_at', '>=', $from)
            ->when($deviceFilter, fn ($q) =>
                $q->whereHas('session', fn ($s) => $s->where('device_type', $deviceFilter))
            )
            ->select(
                DB::raw('HOUR(started_at) as hour'),
                DB::raw('count(*) as total')
            )
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->map(fn ($row) => [
                'hour'  => (int) $row->hour,
                'total' => (int) $row->total,
            ]);

        /* ── Recent Visit Log (paginated) ── */
        $recentVisits = (clone $visitsQuery)
            ->latest('started_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.visitor_analytics.index', compact(
            'days',
            'totalPageViews',
            'uniqueVisitors',
            'averageDuration',
            'activeToday',
            'topPages',
            'deviceBreakdown',
            'browserBreakdown',
            'countryBreakdown',
            'dailyTraffic',
            'hourlyDistribution',
            'recentVisits',
        ));
    }
}
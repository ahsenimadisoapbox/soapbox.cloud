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
        $days = (int) $request->input('days', 30);
        $days = in_array($days, [7, 30, 90], true) ? $days : 30;
        $from = now()->subDays($days);

        $visitsQuery = VisitorPageVisit::query()
            ->with('session')
            ->where('started_at', '>=', $from);

        $totalPageViews = (clone $visitsQuery)->count();
        $uniqueVisitors = (clone $visitsQuery)->distinct('visitor_session_id')->count('visitor_session_id');
        $averageDuration = (int) round((clone $visitsQuery)->avg('duration_seconds') ?? 0);
        $activeToday = VisitorSession::whereDate('last_seen_at', today())->count();

        $topPages = (clone $visitsQuery)
            ->select('page_path', DB::raw('count(*) as views'), DB::raw('avg(duration_seconds) as avg_duration'))
            ->groupBy('page_path')
            ->orderByDesc('views')
            ->take(10)
            ->get();

        $deviceBreakdown = VisitorSession::query()
            ->where('last_seen_at', '>=', $from)
            ->select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get();

        $recentVisits = $visitsQuery
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
            'recentVisits'
        ));
    }
}

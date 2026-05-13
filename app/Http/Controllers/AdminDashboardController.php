<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\EhsAssessment;
use App\Models\Module;
use App\Models\VisitorSession;
use App\Models\VisitorPageVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get aggregated dashboard metrics with date filtering
     * Supports: preset (7, 30, 90) or custom date range
     */
    public function getMetrics(Request $request): JsonResponse
    {
        // Validate date inputs
        $preset = $request->input('preset', 30); // default 30 days
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Determine date range
        if ($startDate && $endDate) {
            try {
                $start = Carbon::parse($startDate)->startOfDay();
                $end = Carbon::parse($endDate)->endOfDay();
            } catch (\Exception $e) {
                return response()->json(['error' => 'Invalid date format'], 400);
            }
        } else {
            $days = (int) $preset;
            $end = Carbon::now();
            $start = $end->copy()->subDays($days);
        }

        // Determine granularity based on date range
        $daysDiff = $start->diffInDays($end);
        $granularity = match (true) {
            $daysDiff <= 7 => 'hourly',
            $daysDiff <= 30 => 'daily',
            default => 'daily' // or 'monthly' for 90+ days
        };

        // Fetch all metrics
        $metrics = [
            'kpi' => $this->getKpiMetrics($start, $end),
            'blogPerformance' => $this->getBlogPerformance($start, $end, $granularity),
            'ehsAssessments' => $this->getEhsAssessments($start, $end),
            'visitorAnalytics' => $this->getVisitorAnalytics($start, $end, $granularity),
            'moduleEngagement' => $this->getModuleEngagement($start, $end, $granularity),
            'topGeography' => $this->getTopGeography($start, $end),
            'dateRange' => [
                'start' => $start->format('Y-m-d'),
                'end' => $end->format('Y-m-d'),
                'granularity' => $granularity,
            ]
        ];

        return response()->json($metrics);
    }

    /**
     * Get KPI Summary Cards
     */
    private function getKpiMetrics(Carbon $start, Carbon $end): array
    {
        $blogCount = Blog::whereBetween('created_at', [$start, $end])->count();
        $ehsCount = EhsAssessment::whereBetween('created_at', [$start, $end])->count();
        $moduleCount = Module::where('status', 'active')->count();
        $visitorSessions = VisitorSession::whereBetween('first_seen_at', [$start, $end])->count();
        $totalPageViews = VisitorPageVisit::whereBetween('started_at', [$start, $end])->sum('duration_seconds'); // This is misleading - use count instead
        $totalPageViews = VisitorPageVisit::whereBetween('started_at', [$start, $end])->count();

        // Calculate previous period for growth comparison
        $prevStart = $start->copy()->subDays($start->diffInDays($end));
        $prevBlogCount = Blog::whereBetween('created_at', [$prevStart, $start])->count();
        $prevEhsCount = EhsAssessment::whereBetween('created_at', [$prevStart, $start])->count();
        $prevVisitorSessions = VisitorSession::whereBetween('first_seen_at', [$prevStart, $start])->count();
        $prevPageViews = VisitorPageVisit::whereBetween('started_at', [$prevStart, $start])->count();

        $blogGrowth = $prevBlogCount > 0 ? round((($blogCount - $prevBlogCount) / $prevBlogCount) * 100, 1) : 0;
        $ehsGrowth = $prevEhsCount > 0 ? round((($ehsCount - $prevEhsCount) / $prevEhsCount) * 100, 1) : 0;
        $visitorGrowth = $prevVisitorSessions > 0 ? round((($visitorSessions - $prevVisitorSessions) / $prevVisitorSessions) * 100, 1) : 0;
        $pageViewGrowth = $prevPageViews > 0 ? round((($totalPageViews - $prevPageViews) / $prevPageViews) * 100, 1) : 0;

        return [
            'totalBlogs' => [
                'value' => $blogCount,
                'label' => 'Total Blogs',
                'growth' => $blogGrowth,
                'icon' => 'book',
                'color' => 'blue'
            ],
            'ehsLeads' => [
                'value' => $ehsCount,
                'label' => 'EHS Assessments',
                'growth' => $ehsGrowth,
                'icon' => 'check-circle',
                'color' => 'green'
            ],
            'activeModules' => [
                'value' => $moduleCount,
                'label' => 'Active Modules',
                'growth' => 0, // Static
                'icon' => 'package',
                'color' => 'orange'
            ],
            'visitorSessions' => [
                'value' => $visitorSessions,
                'label' => 'Visitor Sessions',
                'growth' => $visitorGrowth,
                'icon' => 'users',
                'color' => 'purple',
                'pageViews' => $totalPageViews,
                'pageViewGrowth' => $pageViewGrowth
            ]
        ];
    }

    /**
     * Get Blog Performance Data
     */
    private function getBlogPerformance(Carbon $start, Carbon $end, string $granularity): array
    {
        $labels = [];
        $newPostsData = [];
        $viewsData = [];

        $current = $start->copy();

        while ($current <= $end) {
            $nextPeriod = $granularity === 'hourly' ? $current->copy()->addHour() : $current->copy()->addDay();
            $labels[] = $current->format($granularity === 'hourly' ? 'D H:i' : 'M d');

            // Count new blogs in this period
            $newPosts = Blog::whereBetween('created_at', [$current, $nextPeriod])->count();
            $newPostsData[] = $newPosts;

            // For views, we'll use page visits with 'blog' keyword in path
            $views = VisitorPageVisit::whereBetween('started_at', [$current, $nextPeriod])
                ->where('page_path', 'like', '%blog%')
                ->count();
            $viewsData[] = $views;

            $current = $nextPeriod;
        }

        return [
            'labels' => $labels,
            'newPosts' => $newPostsData,
            'views' => $viewsData
        ];
    }

    /**
     * Get EHS Assessment Funnel Data
     */
    private function getEhsAssessments(Carbon $start, Carbon $end): array
    {
        // Count assessments by status/stage
        // We'll create stages based on field completion

        $allAssessments = EhsAssessment::whereBetween('created_at', [$start, $end])->get();

        $started = $allAssessments->count(); // All records that exist
        $completed = $allAssessments->filter(fn($a) => $a->success !== null)->count(); // Has final answer
        $converted = $allAssessments->filter(fn($a) => $a->pilot_interest === 'yes' || $a->pilot_interest === true)->count(); // Interested in pilot

        return [
            'labels' => ['Started', 'Completed', 'Pilot Interest'],
            'data' => [$started, $completed, $converted],
            'colors' => ['#E3EAF3', '#1D5FC4', '#0FA770']
        ];
    }

    /**
     * Get Visitor Analytics by Device Type and Browser
     */
    private function getVisitorAnalytics(Carbon $start, Carbon $end, string $granularity): array
    {
        // Device Distribution
        $deviceData = VisitorSession::whereBetween('first_seen_at', [$start, $end])
            ->selectRaw('device_type, count(*) as count')
            ->groupBy('device_type')
            ->pluck('count', 'device_type')
            ->toArray();

        // Browser Distribution
        $browserData = VisitorSession::whereBetween('first_seen_at', [$start, $end])
            ->selectRaw('browser, count(*) as count')
            ->groupBy('browser')
            ->orderByRaw('count desc')
            ->limit(6)
            ->pluck('count', 'browser')
            ->toArray();

        // Timeline (Sessions per day)
        $labels = [];
        $sessionsData = [];
        $pageViewsData = [];

        $current = $start->copy();

        while ($current <= $end) {
            $nextPeriod = $granularity === 'hourly' ? $current->copy()->addHour() : $current->copy()->addDay();
            $labels[] = $current->format($granularity === 'hourly' ? 'D H:i' : 'M d');

            $sessions = VisitorSession::whereBetween('first_seen_at', [$current, $nextPeriod])->count();
            $pageViews = VisitorPageVisit::whereBetween('started_at', [$current, $nextPeriod])->count();

            $sessionsData[] = $sessions;
            $pageViewsData[] = $pageViews;

            $current = $nextPeriod;
        }

        return [
            'devices' => [
                'labels' => array_keys($deviceData),
                'data' => array_values($deviceData),
                'colors' => ['#1D5FC4', '#0FA770', '#D97706', '#7C3AED']
            ],
            'browsers' => [
                'labels' => array_keys($browserData),
                'data' => array_values($browserData),
                'colors' => ['#1D5FC4', '#0FA770', '#D97706', '#E03050', '#7C3AED', '#8B5CF6']
            ],
            'timeline' => [
                'labels' => $labels,
                'sessions' => $sessionsData,
                'pageViews' => $pageViewsData
            ]
        ];
    }

    /**
     * Get Module Engagement Data (page views by module)
     */
    private function getModuleEngagement(Carbon $start, Carbon $end, string $granularity): array
    {
        // Get top modules by page views
        $topModules = VisitorPageVisit::whereBetween('started_at', [$start, $end])
            ->where('page_path', 'like', '%modules%')
            ->selectRaw('page_title, count(*) as views')
            ->groupBy('page_title')
            ->orderByRaw('views desc')
            ->limit(5)
            ->pluck('views', 'page_title')
            ->toArray();

        // Timeline data for all modules combined
        $labels = [];
        $timelineData = [];

        $current = $start->copy();

        while ($current <= $end) {
            $nextPeriod = $granularity === 'hourly' ? $current->copy()->addHour() : $current->copy()->addDay();
            $labels[] = $current->format($granularity === 'hourly' ? 'D H:i' : 'M d');

            $views = VisitorPageVisit::whereBetween('started_at', [$current, $nextPeriod])
                ->where('page_path', 'like', '%modules%')
                ->count();
            $timelineData[] = $views;

            $current = $nextPeriod;
        }

        return [
            'topModules' => [
                'labels' => array_keys($topModules),
                'data' => array_values($topModules),
            ],
            'timeline' => [
                'labels' => $labels,
                'data' => $timelineData
            ]
        ];
    }

    /**
     * Get Top Geography Data
     */
    private function getTopGeography(Carbon $start, Carbon $end): array
    {
        $countries = VisitorSession::whereBetween('first_seen_at', [$start, $end])
            ->selectRaw('country_code, count(*) as count')
            ->groupBy('country_code')
            ->orderByRaw('count desc')
            ->limit(10)
            ->pluck('count', 'country_code')
            ->toArray();

        // Top pages
        $pages = VisitorPageVisit::whereBetween('started_at', [$start, $end])
            ->selectRaw('page_title, count(*) as views')
            ->groupBy('page_title')
            ->orderByRaw('views desc')
            ->limit(10)
            ->pluck('views', 'page_title')
            ->toArray();

        return [
            'countries' => [
                'labels' => array_keys($countries),
                'data' => array_values($countries)
            ],
            'pages' => [
                'labels' => array_keys($pages),
                'data' => array_values($pages)
            ]
        ];
    }
}

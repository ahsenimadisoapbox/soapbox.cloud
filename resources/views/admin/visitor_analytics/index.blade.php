@extends('layouts.backend')

@push('styles')
    <style>
        /* ═══════════════════════════════════════
       VISITOR ANALYTICS — PREMIUM DASHBOARD
       Aesthetic: Data-dense editorial dark-light hybrid
       Font: Instrument Serif + DM Sans
    ═══════════════════════════════════════ */
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        :root {
            --ink: #0C1524;
            --ink-2: #1E2D45;
            --muted: #637693;
            --border: #E3EAF3;
            --surface: #F7FAFD;
            --white: #FFFFFF;
            --blue: #1D5FC4;
            --blue-light: #EBF1FB;
            --green: #0FA770;
            --green-light: #E7F8F1;
            --amber: #D97706;
            --amber-light: #FEF3C7;
            --rose: #E03050;
            --rose-light: #FDEAED;
            --violet: #7C3AED;
            --violet-light: #F3EEFF;
            --ff-serif: 'Instrument Serif', Georgia, serif;
            --ff-sans: 'DM Sans', sans-serif;
            --r: 12px;
            --r-lg: 18px;
            --shadow: 0 1px 4px rgba(12, 21, 36, .06), 0 4px 16px rgba(12, 21, 36, .08);
            --shadow-lg: 0 8px 32px rgba(12, 21, 36, .12);
        }

        body {
            font-family: var(--ff-sans);
        }

        /* ── PAGE HEADER ── */
        .va-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .va-title {
            font-family: var(--ff-serif);
            font-size: 28px;
            font-weight: 400;
            color: var(--ink);
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin: 0 0 5px;
        }

        .va-subtitle {
            font-size: 13px;
            color: var(--muted);
            margin: 0;
        }

        /* ── FILTER BAR ── */
        .va-filter-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .va-filter-bar .form-select,
        .va-filter-bar .form-control {
            font-family: var(--ff-sans);
            font-size: 13px;
            border: 1.5px solid var(--border);
            border-radius: var(--r);
            color: var(--ink);
            padding: 8px 14px;
            height: 38px;
            background: var(--white);
            box-shadow: none;
            transition: border-color .2s;
        }

        .va-filter-bar .form-select:focus,
        .va-filter-bar .form-control:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(29, 95, 196, .12);
        }

        .btn-filter {
            height: 38px;
            padding: 0 18px;
            font-family: var(--ff-sans);
            font-size: 13px;
            font-weight: 600;
            border-radius: var(--r);
            border: 1.5px solid var(--blue);
            background: var(--blue);
            color: #fff;
            cursor: pointer;
            transition: background .18s, transform .14s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-filter:hover {
            background: #174fa8;
            transform: translateY(-1px);
        }

        .btn-pdf {
            height: 38px;
            padding: 0 16px;
            font-family: var(--ff-sans);
            font-size: 13px;
            font-weight: 600;
            border-radius: var(--r);
            border: 1.5px solid var(--border);
            background: var(--white);
            color: var(--ink-2);
            cursor: pointer;
            transition: border-color .2s, box-shadow .2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-pdf:hover {
            border-color: var(--rose);
            color: var(--rose);
            box-shadow: 0 2px 10px rgba(224, 48, 80, .1);
        }

        /* ── KPI CARDS ── */
        .kpi-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            padding: 22px 22px 18px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform .3s, box-shadow .3s;
        }

        .kpi-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .kpi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: var(--r-lg) var(--r-lg) 0 0;
        }

        .kpi-blue::before {
            background: var(--blue);
        }

        .kpi-green::before {
            background: var(--green);
        }

        .kpi-amber::before {
            background: var(--amber);
        }

        .kpi-rose::before {
            background: var(--rose);
        }

        .kpi-violet::before {
            background: var(--violet);
        }

        .kpi-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 10px;
        }

        .kpi-value {
            font-family: var(--ff-serif);
            font-size: 34px;
            line-height: 1;
            color: var(--ink);
            letter-spacing: -0.03em;
            margin-bottom: 10px;
        }

        .kpi-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 9px;
            border-radius: 100px;
        }

        .kpi-badge-blue {
            background: var(--blue-light);
            color: var(--blue);
        }

        .kpi-badge-green {
            background: var(--green-light);
            color: var(--green);
        }

        .kpi-badge-amber {
            background: var(--amber-light);
            color: var(--amber);
        }

        .kpi-badge-rose {
            background: var(--rose-light);
            color: var(--rose);
        }

        .kpi-badge-violet {
            background: var(--violet-light);
            color: var(--violet);
        }

        .kpi-icon {
            position: absolute;
            bottom: 14px;
            right: 16px;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: .1;
        }

        .kpi-icon svg {
            width: 22px;
            height: 22px;
        }

        /* ── CHART CARDS ── */
        .chart-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .chart-card-header {
            padding: 18px 22px 14px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chart-card-title {
            font-family: var(--ff-serif);
            font-size: 16px;
            font-weight: 400;
            color: var(--ink);
            margin: 0;
            letter-spacing: -0.01em;
        }

        .chart-card-meta {
            font-size: 11px;
            color: var(--muted);
            font-weight: 500;
            letter-spacing: .04em;
        }

        .chart-card-body {
            padding: 22px;
        }

        .chart-wrap {
            position: relative;
        }

        /* ── TIMELINE BAR ── */
        .timeline-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            box-shadow: var(--shadow);
        }

        .timeline-card-header {
            padding: 18px 22px 14px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* ── TABLE ── */
        .va-table-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .va-table-head {
            padding: 18px 22px 14px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .va-table-title {
            font-family: var(--ff-serif);
            font-size: 16px;
            color: var(--ink);
            margin: 0;
            letter-spacing: -0.01em;
        }

        .va-search {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: var(--r);
            padding: 0 14px;
            height: 36px;
            transition: border-color .2s;
        }

        .va-search:focus-within {
            border-color: var(--blue);
            background: #fff;
        }

        .va-search input {
            border: none;
            background: transparent;
            outline: none;
            font-family: var(--ff-sans);
            font-size: 13px;
            color: var(--ink);
            width: 180px;
        }

        .va-search svg {
            color: var(--muted);
            flex-shrink: 0;
        }

        .va-table {
            width: 100%;
            border-collapse: collapse;
        }

        .va-table thead tr {
            background: var(--surface);
        }

        .va-table th {
            padding: 11px 16px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: var(--muted);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .va-table td {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--ink-2);
            border-bottom: 1px solid rgba(227, 234, 243, .5);
            vertical-align: middle;
        }

        .va-table tbody tr:hover {
            background: var(--surface);
        }

        .va-table tbody tr:last-child td {
            border-bottom: none;
        }

        .va-table .path-primary {
            font-weight: 600;
            font-size: 13px;
            color: var(--ink);
        }

        .va-table .path-secondary {
            font-size: 11px;
            color: var(--muted);
            margin-top: 2px;
        }

        /* DEVICE BADGE */
        .dev-badge {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 6px;
        }

        .dev-desktop {
            background: var(--blue-light);
            color: var(--blue);
        }

        .dev-mobile {
            background: var(--green-light);
            color: var(--green);
        }

        .dev-tablet {
            background: var(--amber-light);
            color: var(--amber);
        }

        .dev-unknown {
            background: var(--surface);
            color: var(--muted);
            border: 1px solid var(--border);
        }

        /* ── SECTION LABEL ── */
        .section-eyebrow {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--blue);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-eyebrow::before {
            content: '';
            display: block;
            width: 20px;
            height: 2px;
            background: var(--blue);
            border-radius: 1px;
        }

        /* ── TOP PAGES BAR ── */
        .top-page-row {
            padding: 10px 0;
        }

        .top-page-row+.top-page-row {
            border-top: 1px solid rgba(227, 234, 243, .7);
        }

        .top-page-path {
            font-size: 13px;
            font-weight: 500;
            color: var(--ink);
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .top-page-bar-wrap {
            height: 6px;
            background: var(--surface);
            border-radius: 3px;
            overflow: hidden;
        }

        .top-page-bar {
            height: 100%;
            border-radius: 3px;
            transition: width 1.2s cubic-bezier(.23, 1, .32, 1);
        }

        .top-page-meta {
            font-size: 11px;
            color: var(--muted);
            margin-top: 4px;
            display: flex;
            justify-content: space-between;
        }

        /* ── PAGINATION ── */
        .va-pagination {
            padding: 16px 22px;
            border-top: 1px solid var(--border);
        }

        .va-pagination .pagination {
            margin: 0;
        }

        /* ── LOADING SPINNER ── */
        #pdf-loading {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(12, 21, 36, .5);
            align-items: center;
            justify-content: center;
        }

        #pdf-loading.show {
            display: flex;
        }

        .pdf-spinner {
            background: var(--white);
            border-radius: var(--r-lg);
            padding: 32px 40px;
            text-align: center;
            box-shadow: var(--shadow-lg);
        }

        .pdf-spinner p {
            font-size: 14px;
            color: var(--muted);
            margin: 12px 0 0;
        }
    </style>
@endpush

@section('content')

    {{-- PDF Loading overlay --}}
    <div id="pdf-loading">
        <div class="pdf-spinner">
            <div class="spinner-border text-primary" style="width:2.2rem;height:2.2rem;" role="status"></div>
            <p>Generating PDF report…</p>
        </div>
    </div>

    {{-- ═══════════ PAGE HEADER ═══════════ --}}
    <div class="va-header" id="va-report-header">
        <div>
            <h1 class="va-title">Visitor Analytics</h1>
            <p class="va-subtitle">Live user tracking · page visits · devices · location signals · engagement time</p>
        </div>

        <form method="GET" id="filterForm" class="va-filter-bar">
            {{-- Period --}}
            <select name="days" class="form-select" style="width:140px;">
                <option value="7" {{ $days === 7 ? 'selected' : '' }}>Last 7 days</option>
                <option value="30" {{ $days === 30 ? 'selected' : '' }}>Last 30 days</option>
                <option value="90" {{ $days === 90 ? 'selected' : '' }}>Last 90 days</option>
            </select>

            {{-- Device filter --}}
            <select name="device" class="form-select" style="width:140px;">
                <option value="" {{ request('device') == '' ? 'selected' : '' }}>All Devices</option>
                <option value="desktop" {{ request('device') == 'desktop' ? 'selected' : '' }}>Desktop</option>
                <option value="mobile" {{ request('device') == 'mobile' ? 'selected' : '' }}>Mobile</option>
                <option value="tablet" {{ request('device') == 'tablet' ? 'selected' : '' }}>Tablet</option>
            </select>

            {{-- Country filter --}}
            <input type="text" name="country" class="form-control" placeholder="Country code…" style="width:130px;"
                value="{{ request('country') }}">

            {{-- Page path search --}}
            <input type="text" name="page" class="form-control" placeholder="Page path…" style="width:160px;"
                value="{{ request('page') }}">

            <button type="submit" class="btn-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                Apply
            </button>

            <a href="{{ route('admin.visitor-analytics.index') }}" class="btn-pdf"
                style="text-decoration:none;color:var(--muted);">
                Reset
            </a>

            <button type="button" class="btn-pdf" id="btnDownloadPdf">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                    <polyline points="7 10 12 15 17 10" />
                    <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                Export PDF
            </button>
        </form>
    </div>

    {{-- ═══════════ KPI STRIP ═══════════ --}}
    <div class="row g-3 mb-4" id="va-kpis">

        <div class="col-6 col-lg">
            <div class="kpi-card kpi-blue">
                <div class="kpi-label">Page Views</div>
                <div class="kpi-value" data-count="{{ $totalPageViews }}">0</div>
                <span class="kpi-badge kpi-badge-blue">↑ {{ $days }}d window</span>
                <div class="kpi-icon" style="background:var(--blue);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="2" stroke-linecap="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg">
            <div class="kpi-card kpi-green">
                <div class="kpi-label">Unique Visitors</div>
                <div class="kpi-value" data-count="{{ $uniqueVisitors }}">0</div>
                <span class="kpi-badge kpi-badge-green">Sessions</span>
                <div class="kpi-icon" style="background:var(--green);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2" stroke-linecap="round">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87" />
                        <path d="M16 3.13a4 4 0 010 7.75" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg">
            <div class="kpi-card kpi-amber">
                <div class="kpi-label">Avg. Time on Page</div>
                <div class="kpi-value">{{ gmdate('i:s', $averageDuration) }}</div>
                <span class="kpi-badge kpi-badge-amber">Min:Sec</span>
                <div class="kpi-icon" style="background:var(--amber);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--amber)" stroke-width="2" stroke-linecap="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg">
            <div class="kpi-card kpi-rose">
                <div class="kpi-label">Active Today</div>
                <div class="kpi-value" data-count="{{ $activeToday }}">0</div>
                <span class="kpi-badge kpi-badge-rose">Live sessions</span>
                <div class="kpi-icon" style="background:var(--rose);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--rose)" stroke-width="2" stroke-linecap="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg">
            <div class="kpi-card kpi-violet">
                <div class="kpi-label">Total Sessions</div>
                <div class="kpi-value" data-count="{{ $deviceBreakdown->sum('total') }}">0</div>
                <span class="kpi-badge kpi-badge-violet">All devices</span>
                <div class="kpi-icon" style="background:var(--violet);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--violet)" stroke-width="2" stroke-linecap="round">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2" />
                        <line x1="12" y1="18" x2="12.01" y2="18" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══════════ CHARTS ROW 1 — Line + Doughnut ═══════════ --}}
    <div class="row g-4 mb-4">

        {{-- Daily Traffic Line Chart --}}
        <div class="col-lg-8">
            <div class="timeline-card">
                <div class="timeline-card-header">
                    <div>
                        <div class="chart-card-title" style="font-family:var(--ff-serif);font-size:16px;color:var(--ink);">
                            Daily Traffic Trend
                        </div>
                        <div style="font-size:11px;color:var(--muted);margin-top:2px;">Page views &amp; unique visitors over
                            time</div>
                    </div>
                    <div class="d-flex gap-3" style="font-size:12px;">
                        <span style="display:flex;align-items:center;gap:5px;color:var(--blue);font-weight:600;">
                            <span
                                style="display:inline-block;width:14px;height:3px;border-radius:2px;background:var(--blue);"></span>Views
                        </span>
                        <span style="display:flex;align-items:center;gap:5px;color:var(--green);font-weight:600;">
                            <span
                                style="display:inline-block;width:14px;height:3px;border-radius:2px;background:var(--green);"></span>Visitors
                        </span>
                    </div>
                </div>
                <div style="padding:22px;">
                    <canvas id="lineChart" height="100"></canvas>
                </div>
            </div>
        </div>

        {{-- Device Doughnut --}}
        <div class="col-lg-4">
            <div class="chart-card h-100">
                <div class="chart-card-header">
                    <div class="chart-card-title">Device Split</div>
                    <span class="chart-card-meta">By session count</span>
                </div>
                <div class="chart-card-body d-flex flex-column align-items-center">
                    <div class="chart-wrap" style="width:200px;height:200px;">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                    <div class="mt-4 w-100">
                        @php $totalDevices = $deviceBreakdown->sum('total'); @endphp
                        @foreach($deviceBreakdown as $device)
                            @php
                                $pct = $totalDevices > 0 ? round(($device->total / $totalDevices) * 100, 1) : 0;
                                $colors = ['desktop' => '#1D5FC4', 'mobile' => '#0FA770', 'tablet' => '#D97706', 'unknown' => '#A0AEC0'];
                                $c = $colors[$device->device_type] ?? '#A0AEC0';
                              @endphp
                            <div class="d-flex align-items-center justify-content-between py-2"
                                style="border-top:1px solid var(--border);font-size:13px;">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        style="width:10px;height:10px;border-radius:50%;background:{{ $c }};display:inline-block;flex-shrink:0;"></span>
                                    <span class="text-capitalize"
                                        style="color:var(--ink-2);">{{ $device->device_type ?: 'Unknown' }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <span style="font-weight:600;color:var(--ink);">{{ number_format($device->total) }}</span>
                                    <span
                                        style="font-size:11px;color:var(--muted);min-width:34px;text-align:right;">{{ $pct }}%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══════════ CHARTS ROW 2 — Bar + Horizontal bar ═══════════ --}}
    <div class="row g-4 mb-4">

        {{-- Hourly Distribution Bar --}}
        <div class="col-lg-6">
            <div class="chart-card">
                <div class="chart-card-header">
                    <div class="chart-card-title">Traffic by Hour of Day</div>
                    <span class="chart-card-meta">Average across period</span>
                </div>
                <div class="chart-card-body">
                    <canvas id="hourlyBar" height="130"></canvas>
                </div>
            </div>
        </div>

        {{-- Browser pie --}}
        <div class="col-lg-6">
            <div class="chart-card">
                <div class="chart-card-header">
                    <div class="chart-card-title">Browser Distribution</div>
                    <span class="chart-card-meta">By session count</span>
                </div>
                <div class="chart-card-body d-flex align-items-center gap-4">
                    <div style="width:180px;height:180px;flex-shrink:0;">
                        <canvas id="browserPie"></canvas>
                    </div>
                    <div class="flex-grow-1" id="browserLegend" style="font-size:12px;"></div>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══════════ TOP PAGES + Funnel row ═══════════ --}}
    <div class="row g-4 mb-4">

        {{-- Top Pages inline bars --}}
        <div class="col-lg-7">
            <div class="chart-card">
                <div class="chart-card-header">
                    <div class="chart-card-title">Top Pages by Views</div>
                    <span class="chart-card-meta">Last {{ $days }} days</span>
                </div>
                <div class="chart-card-body">
                    @php $maxViews = $topPages->max('views') ?: 1; @endphp
                    @forelse($topPages as $i => $page)
                        @php
                            $colors = ['#1D5FC4', '#0FA770', '#7C3AED', '#D97706', '#E03050', '#0EA5B4', '#F59E0B', '#6366F1', '#14B8A6', '#EC4899'];
                            $bar = $colors[$i % count($colors)];
                            $w = round(($page->views / $maxViews) * 100);
                        @endphp
                        <div class="top-page-row">
                            <div class="top-page-path" title="{{ $page->page_path }}">{{ $page->page_path }}</div>
                            <div class="top-page-bar-wrap">
                                <div class="top-page-bar" style="width:0%;background:{{ $bar }};" data-width="{{ $w }}%"></div>
                            </div>
                            <div class="top-page-meta">
                                <span>{{ number_format($page->views) }} views</span>
                                <span>Avg {{ gmdate('i:s', (int) $page->avg_duration) }}</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted" style="font-size:13px;">No page data available.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Country horizontal bar --}}
        <div class="col-lg-5">
            <div class="chart-card h-100">
                <div class="chart-card-header">
                    <div class="chart-card-title">Visits by Country</div>
                    <span class="chart-card-meta">Top 8</span>
                </div>
                <div class="chart-card-body">
                    <canvas id="countryBar" height="200"></canvas>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══════════ FULL VISIT LOG ═══════════ --}}
    <div class="va-table-card" id="va-visit-log">
        <div class="va-table-head">
            <div>
                <div class="va-table-title">Complete Visit Log</div>
                <div style="font-size:11px;color:var(--muted);margin-top:3px;">
                    {{ number_format($recentVisits->total()) }} records · Page {{ $recentVisits->currentPage() }} of
                    {{ $recentVisits->lastPage() }}
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <div class="va-search">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    <input type="text" id="tableSearch" placeholder="Filter visible rows…">
                </div>
            </div>
        </div>

        <div style="overflow-x:auto;">
            <table class="va-table" id="visitLogTable">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Page</th>
                        <th>IP / Session</th>
                        <th>Device</th>
                        <th>Browser / OS</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Referrer</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentVisits as $visit)
                        <tr class="log-row">
                            <td style="white-space:nowrap;">
                                <div style="font-size:13px;font-weight:500;color:var(--ink);">
                                    {{ optional($visit->started_at)->format('d M Y') }}</div>
                                <div style="font-size:11px;color:var(--muted);">
                                    {{ optional($visit->started_at)->format('h:i A') }}</div>
                            </td>
                            <td style="min-width:220px;max-width:260px;">
                                <div class="path-primary">{{ Str::limit($visit->page_title ?: $visit->page_path, 48) }}</div>
                                <div class="path-secondary">{{ $visit->page_path }}</div>
                            </td>
                            <td>
                                <code
                                    style="font-size:12px;background:var(--surface);padding:2px 7px;border-radius:5px;color:var(--blue);">{{ $visit->session->ip_address ?? '-' }}</code>
                                <div style="font-size:10px;color:var(--muted);margin-top:3px;">
                                    {{ Str::limit($visit->session->session_key ?? '-', 12, '…') }}</div>
                            </td>
                            <td>
                                @php
                                    $dt = strtolower($visit->session->device_type ?? 'unknown');
                                    $cls = in_array($dt, ['desktop', 'mobile', 'tablet']) ? 'dev-' . $dt : 'dev-unknown';
                                @endphp
                                <span class="dev-badge {{ $cls }}">{{ $dt }}</span>
                            </td>
                            <td style="white-space:nowrap;">
                                <div style="font-size:13px;color:var(--ink-2);">{{ $visit->session->browser ?? 'Unknown' }}
                                </div>
                                <div style="font-size:11px;color:var(--muted);">{{ $visit->session->os ?? 'Unknown' }}</div>
                            </td>
                            <td>
                                <div style="font-size:13px;font-weight:600;color:var(--ink);">
                                    {{ $visit->session->country_code ?? 'N/A' }}</div>
                                <div style="font-size:11px;color:var(--muted);">{{ $visit->session->timezone ?? '-' }}</div>
                            </td>
                            <td>
                                <span style="font-family:monospace;font-size:13px;color:var(--ink-2);">
                                    {{ gmdate('i:s', (int) $visit->duration_seconds) }}
                                </span>
                            </td>
                            <td style="max-width:200px;">
                                <div style="font-size:11px;color:var(--muted);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"
                                    title="{{ $visit->referrer }}">
                                    {{ Str::limit($visit->referrer ?: 'Direct', 60) }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;padding:48px;color:var(--muted);font-size:13px;">
                                No visit records found for the selected filters.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="va-pagination">
            {{ $recentVisits->links() }}
        </div>
    </div>

@endsection

@push('scripts')
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    {{-- html2canvas + jsPDF for PDF export --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        /* ═══════════════════════════════════════
           DATA PASSED FROM BLADE
        ═══════════════════════════════════════ */
        const VA = {
            topPages: @json($topPages),
            devices: @json($deviceBreakdown),
            browsers: @json($browserBreakdown ?? []),
            countries: @json($countryBreakdown ?? []),
            daily: @json($dailyTraffic ?? []),
            hourly: @json($hourlyDistribution ?? []),
        };

        /* ── Chart.js global defaults ── */
        Chart.defaults.font.family = "'DM Sans', sans-serif";
        Chart.defaults.font.size = 12;
        Chart.defaults.color = '#637693';

        const PALETTE = ['#1D5FC4', '#0FA770', '#7C3AED', '#D97706', '#E03050', '#0EA5B4', '#F59E0B', '#6366F1', '#14B8A6', '#EC4899', '#84CC16', '#F97316'];

        /* ─────────────────────────────────────
           1. LINE CHART — Daily Traffic
        ───────────────────────────────────── */
        (function () {
            const ctx = document.getElementById('lineChart').getContext('2d');

            // Build daily labels from controller data or fallback empty
            let labels = [], viewsData = [], visitorsData = [];

            if (VA.daily.length) {
                VA.daily.forEach(d => {
                    labels.push(d.date);
                    viewsData.push(d.views ?? d.total ?? 0);
                    visitorsData.push(d.visitors ?? d.unique ?? 0);
                });
            } else {
                // Fallback: generate placeholder for days range
                const days = parseInt('{{ $days }}') || 30;
                for (let i = days - 1; i >= 0; i--) {
                    const d = new Date(); d.setDate(d.getDate() - i);
                    labels.push(d.toLocaleDateString('en-GB', { day: '2-digit', month: 'short' }));
                    viewsData.push(0); visitorsData.push(0);
                }
            }

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Page Views',
                            data: viewsData,
                            borderColor: '#1D5FC4',
                            backgroundColor: 'rgba(29,95,196,0.08)',
                            borderWidth: 2.5,
                            pointRadius: 3,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#1D5FC4',
                            tension: 0.42,
                            fill: true,
                        },
                        {
                            label: 'Unique Visitors',
                            data: visitorsData,
                            borderColor: '#0FA770',
                            backgroundColor: 'rgba(15,167,112,0.06)',
                            borderWidth: 2,
                            pointRadius: 3,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#0FA770',
                            tension: 0.42,
                            fill: true,
                        },
                    ]
                },
                options: {
                    responsive: true,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#fff',
                            borderColor: '#E3EAF3',
                            borderWidth: 1,
                            titleColor: '#0C1524',
                            bodyColor: '#637693',
                            padding: 12,
                            boxPadding: 6,
                        }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { maxTicksLimit: 10 } },
                        y: { grid: { color: 'rgba(227,234,243,0.7)' }, beginAtZero: true }
                    }
                }
            });
        })();

        /* ─────────────────────────────────────
           2. DOUGHNUT — Device Breakdown
        ───────────────────────────────────── */
        (function () {
            const ctx = document.getElementById('doughnutChart').getContext('2d');
            const devColors = { desktop: '#1D5FC4', mobile: '#0FA770', tablet: '#D97706', unknown: '#A0AEC0' };
            const labels = VA.devices.map(d => (d.device_type || 'Unknown'));
            const data = VA.devices.map(d => d.total);
            const colors = VA.devices.map(d => devColors[d.device_type] || '#A0AEC0');

            new Chart(ctx, {
                type: 'doughnut',
                data: { labels, datasets: [{ data, backgroundColor: colors, borderWidth: 3, borderColor: '#fff', hoverBorderColor: '#fff', hoverOffset: 8 }] },
                options: {
                    cutout: '68%',
                    plugins: {
                        legend: { display: false },
                        tooltip: { backgroundColor: '#fff', borderColor: '#E3EAF3', borderWidth: 1, titleColor: '#0C1524', bodyColor: '#637693', padding: 10 }
                    }
                }
            });
        })();

        /* ─────────────────────────────────────
           3. BAR — Hourly Traffic
        ───────────────────────────────────── */
        (function () {
            const ctx = document.getElementById('hourlyBar').getContext('2d');
            let hours = Array.from({ length: 24 }, (_, i) => `${String(i).padStart(2, '0')}:00`);
            let data;

            if (VA.hourly.length) {
                const map = {};
                VA.hourly.forEach(h => { map[parseInt(h.hour)] = h.total ?? h.views ?? 0; });
                data = Array.from({ length: 24 }, (_, i) => map[i] ?? 0);
            } else {
                data = Array.from({ length: 24 }, () => 0);
            }

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: hours,
                    datasets: [{
                        label: 'Visits',
                        data,
                        backgroundColor: data.map((v, i) => {
                            const peak = Math.max(...data);
                            const ratio = peak ? v / peak : 0;
                            return `rgba(29,95,196,${0.2 + ratio * 0.75})`;
                        }),
                        borderRadius: 5,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: { backgroundColor: '#fff', borderColor: '#E3EAF3', borderWidth: 1, titleColor: '#0C1524', bodyColor: '#637693', padding: 10 }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { maxTicksLimit: 12 } },
                        y: { grid: { color: 'rgba(227,234,243,0.7)' }, beginAtZero: true }
                    }
                }
            });
        })();

        /* ─────────────────────────────────────
           4. PIE — Browser Distribution
        ───────────────────────────────────── */
        (function () {
            const ctx = document.getElementById('browserPie').getContext('2d');
            const legend = document.getElementById('browserLegend');

            let labels, data;
            if (VA.browsers.length) {
                labels = VA.browsers.map(b => b.browser || 'Unknown');
                data = VA.browsers.map(b => b.total);
            } else {
                labels = ['Chrome', 'Firefox', 'Safari', 'Edge', 'Other'];
                data = [0, 0, 0, 0, 0];
            }

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels,
                    datasets: [{ data, backgroundColor: PALETTE.slice(0, labels.length), borderWidth: 2.5, borderColor: '#fff' }]
                },
                options: {
                    plugins: {
                        legend: { display: false },
                        tooltip: { backgroundColor: '#fff', borderColor: '#E3EAF3', borderWidth: 1, titleColor: '#0C1524', bodyColor: '#637693', padding: 10 }
                    }
                }
            });

            // Custom legend
            const total = data.reduce((a, b) => a + b, 0);
            legend.innerHTML = labels.map((l, i) => `
        <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 0;
             ${i < labels.length - 1 ? 'border-bottom:1px solid rgba(227,234,243,.7)' : ''}">
          <span style="display:flex;align-items:center;gap:7px;">
            <span style="width:9px;height:9px;border-radius:50%;background:${PALETTE[i]};display:inline-block;flex-shrink:0;"></span>
            <span style="color:#1E2D45;">${l}</span>
          </span>
          <span style="font-weight:600;color:#0C1524;">${total ? Math.round(data[i] / total * 100) : 0}%</span>
        </div>`).join('');
        })();

        /* ─────────────────────────────────────
           5. HORIZONTAL BAR — Countries
        ───────────────────────────────────── */
        (function () {
            const ctx = document.getElementById('countryBar').getContext('2d');

            let labels, data;
            if (VA.countries.length) {
                labels = VA.countries.map(c => c.country_code || 'N/A');
                data = VA.countries.map(c => c.total);
            } else {
                labels = ['N/A']; data = [0];
            }

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: 'Visits',
                        data,
                        backgroundColor: PALETTE.slice(0, labels.length),
                        borderRadius: 5,
                        borderSkipped: false,
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: { backgroundColor: '#fff', borderColor: '#E3EAF3', borderWidth: 1, titleColor: '#0C1524', bodyColor: '#637693', padding: 10 }
                    },
                    scales: {
                        x: { grid: { color: 'rgba(227,234,243,0.7)' }, beginAtZero: true },
                        y: { grid: { display: false } }
                    }
                }
            });
        })();

        /* ─────────────────────────────────────
           ANIMATED COUNTERS
        ───────────────────────────────────── */
        document.querySelectorAll('[data-count]').forEach(el => {
            const target = parseInt(el.dataset.count, 10);
            if (!target) return;
            const start = performance.now();
            const dur = 1800;
            (function step(now) {
                const t = Math.min((now - start) / dur, 1);
                const e = 1 - Math.pow(1 - t, 4);
                el.textContent = Math.floor(e * target).toLocaleString();
                if (t < 1) requestAnimationFrame(step);
                else el.textContent = target.toLocaleString();
            })(start);
        });

        /* ─────────────────────────────────────
           TOP PAGE BARS — animate on scroll
        ───────────────────────────────────── */
        const barObserver = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.querySelectorAll('.top-page-bar').forEach(bar => {
                        bar.style.width = bar.dataset.width;
                    });
                    barObserver.unobserve(e.target);
                }
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('.chart-card').forEach(c => barObserver.observe(c));

        /* ─────────────────────────────────────
           TABLE SEARCH — filter visible rows
        ───────────────────────────────────── */
        document.getElementById('tableSearch')?.addEventListener('input', function () {
            const q = this.value.toLowerCase();
            document.querySelectorAll('#visitLogTable .log-row').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });

        /* ─────────────────────────────────────
           PDF EXPORT — html2canvas + jsPDF
        ───────────────────────────────────── */
        document.getElementById('btnDownloadPdf')?.addEventListener('click', async () => {
            const overlay = document.getElementById('pdf-loading');
            overlay.classList.add('show');

            try {
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF({ orientation: 'landscape', unit: 'mm', format: 'a4' });
                const pw = pdf.internal.pageSize.getWidth();
                const ph = pdf.internal.pageSize.getHeight();

                // Sections to capture
                const sections = [
                    { id: 'va-report-header', label: null },
                    { id: 'va-kpis', label: null },
                ];

                // Capture charts individually for better quality
                const chartCanvases = document.querySelectorAll('canvas');
                const pageEl = document.getElementById('va-visit-log');

                // Build multi-page PDF
                const target = document.querySelector('.container-fluid') || document.body;
                const canvas = await html2canvas(target, {
                    scale: 1.5,
                    useCORS: true,
                    logging: false,
                    backgroundColor: '#F7FAFD',
                    ignoreElements: el => el.id === 'pdf-loading',
                });

                const imgData = canvas.toDataURL('image/jpeg', 0.88);
                const imgH = (canvas.height * pw) / canvas.width;
                let yPos = 0;

                while (yPos < imgH) {
                    if (yPos > 0) pdf.addPage();
                    pdf.addImage(imgData, 'JPEG', 0, -yPos, pw, imgH, '', 'FAST');
                    yPos += ph;
                }

                pdf.save(`visitor-analytics-{{ $days }}d-${new Date().toISOString().slice(0, 10)}.pdf`);
            } catch (err) {
                console.error('PDF generation failed:', err);
                alert('PDF export failed. Please try again.');
            } finally {
                overlay.classList.remove('show');
            }
        });
    </script>
@endpush
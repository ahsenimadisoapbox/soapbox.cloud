@extends('layouts.backend')

@push('styles')
    <style>
        /* ═══════════════════════════════════════
           ADMIN DASHBOARD — COMPREHENSIVE ANALYTICS
           Aesthetic: Data-dense editorial dark-light hybrid
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
        .dashboard-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .dashboard-title {
            font-family: var(--ff-serif);
            font-size: 28px;
            font-weight: 400;
            color: var(--ink);
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin: 0 0 5px;
        }

        .dashboard-subtitle {
            font-size: 13px;
            color: var(--muted);
            margin: 0;
        }

        /* ── FILTER BAR ── */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 28px;
            padding: 16px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            box-shadow: var(--shadow);
        }

        .filter-bar .form-control,
        .filter-bar .form-select {
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

        .filter-bar .form-control:focus,
        .filter-bar .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(29, 95, 196, .12);
        }

        .btn-preset {
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
            transition: all .18s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-preset:hover {
            border-color: var(--blue);
            color: var(--blue);
        }

        .btn-preset.active {
            border-color: var(--blue);
            background: var(--blue);
            color: #fff;
        }

        .btn-action {
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

        .btn-action:hover {
            background: #174fa8;
            transform: translateY(-1px);
        }

        .filter-divider {
            width: 1px;
            height: 24px;
            background: var(--border);
            margin: 0 4px;
        }

        /* ── KPI CARDS ── */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

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
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .kpi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--blue);
        }

        .kpi-card.green::before { background: var(--green); }
        .kpi-card.orange::before { background: var(--amber); }
        .kpi-card.purple::before { background: var(--violet); }

        .kpi-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
        }

        .kpi-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--r);
            font-size: 18px;
            flex-shrink: 0;
        }

        .kpi-card.blue .kpi-icon { background: var(--blue-light); color: var(--blue); }
        .kpi-card.green .kpi-icon { background: var(--green-light); color: var(--green); }
        .kpi-card.orange .kpi-icon { background: var(--amber-light); color: var(--amber); }
        .kpi-card.purple .kpi-icon { background: var(--violet-light); color: var(--violet); }

        .kpi-value {
            font-size: 32px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1;
            margin: 0;
        }

        .kpi-label {
            font-size: 12px;
            color: var(--muted);
            margin: 8px 0 0;
        }

        .kpi-growth {
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        .kpi-growth.positive { color: var(--green); }
        .kpi-growth.negative { color: var(--rose); }

        /* ── CHART CONTAINER ── */
        .chart-section {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .chart-title {
            font-family: var(--ff-serif);
            font-size: 18px;
            font-weight: 400;
            color: var(--ink);
            letter-spacing: -0.01em;
            margin: 0;
        }

        .chart-toggle {
            display: flex;
            gap: 8px;
        }

        .toggle-btn {
            padding: 6px 12px;
            font-family: var(--ff-sans);
            font-size: 12px;
            font-weight: 600;
            border: 1.5px solid var(--border);
            background: var(--white);
            color: var(--ink-2);
            border-radius: var(--r);
            cursor: pointer;
            transition: all .2s;
        }

        .toggle-btn.active {
            border-color: var(--blue);
            background: var(--blue);
            color: #fff;
        }

        .toggle-btn:hover {
            border-color: var(--blue);
        }

        /* ── CHART CANVAS ── */
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 16px;
        }

        .chart-container.tall {
            height: 400px;
        }

        .loading-spinner {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .loading-spinner.active {
            display: block;
        }

        .spinner {
            border: 3px solid var(--border);
            border-top: 3px solid var(--blue);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* ── GRID LAYOUT ── */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .charts-grid.full {
            grid-template-columns: 1fr;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
            }

            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-bar .form-control,
            .filter-bar .form-select,
            .btn-preset,
            .btn-action {
                width: 100%;
            }

            .kpi-grid {
                grid-template-columns: 1fr;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }

            .chart-container {
                height: 250px;
            }

            .btn-preset,
            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }

        /* ── EXPORT BUTTON ── */
        .btn-export {
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

        .btn-export:hover {
            border-color: var(--rose);
            color: var(--rose);
            box-shadow: 0 2px 10px rgba(224, 48, 80, .1);
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--muted);
        }

        .empty-state p {
            margin: 0;
            font-size: 14px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="dashboard-header">
            <div>
                <h1 class="dashboard-title">Dashboard</h1>
                <p class="dashboard-subtitle">Comprehensive business analytics & performance metrics</p>
            </div>
            <button class="btn-export" onclick="exportDashboardPDF(event)" title="Export charts to PDF">
                <i class="bi bi-download"></i> Export PDF
            </button>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <button class="btn-preset active" data-preset="7">Last 7 days</button>
                <button class="btn-preset" data-preset="30">Last 30 days</button>
                <button class="btn-preset" data-preset="90">Last 90 days</button>
            </div>

            <div class="filter-divider"></div>

            <input type="date" class="form-control" id="startDate" style="max-width: 140px;" placeholder="Start">
            <input type="date" class="form-control" id="endDate" style="max-width: 140px;" placeholder="End">
            <button class="btn-action" onclick="applyCustomDateRange()">
                <i class="bi bi-funnel"></i> Apply
            </button>

            <div style="flex: 1;"></div>

            <button class="btn-action" onclick="refreshMetrics()">
                <i class="bi bi-arrow-clockwise"></i> Refresh
            </button>
        </div>

        <!-- KPI Cards -->
        <div class="kpi-grid" id="kpiContainer">
            <!-- Loaded via AJAX -->
        </div>

        <!-- Blog Performance Chart -->
        <div class="chart-section">
            <div class="chart-header">
                <h3 class="chart-title">📰 Blog Performance</h3>
            </div>
            <div class="chart-container">
                <div class="loading-spinner" id="blogSpinner">
                    <div class="spinner"></div>
                </div>
                <canvas id="blogChart"></canvas>
            </div>
            <small style="color: var(--muted);">Line: New blog posts | Bars: Page views with 'blog' in path</small>
        </div>

        <!-- Charts Grid (2 columns) -->
        <div class="charts-grid">
            <!-- EHS Assessments Funnel -->
            <div class="chart-section">
                <div class="chart-header">
                    <h3 class="chart-title">🎯 EHS Assessment Funnel</h3>
                </div>
                <div class="chart-container">
                    <div class="loading-spinner" id="ehsSpinner">
                        <div class="spinner"></div>
                    </div>
                    <canvas id="ehsChart"></canvas>
                </div>
            </div>

            <!-- Visitor Analytics Distribution -->
            <div class="chart-section">
                <div class="chart-header">
                    <h3 class="chart-title">👥 Visitor Analytics</h3>
                    <div class="chart-toggle">
                        <button class="toggle-btn active" onclick="toggleAnalyticsView('device')">Device</button>
                        <button class="toggle-btn" onclick="toggleAnalyticsView('browser')">Browser</button>
                    </div>
                </div>
                <div class="chart-container">
                    <div class="loading-spinner" id="visitorSpinner">
                        <div class="spinner"></div>
                    </div>
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Module Engagement & Geography -->
        <div class="charts-grid">
            <!-- Module Engagement -->
            <div class="chart-section">
                <div class="chart-header">
                    <h3 class="chart-title">📦 Module Engagement</h3>
                </div>
                <div class="chart-container tall">
                    <div class="loading-spinner" id="moduleSpinner">
                        <div class="spinner"></div>
                    </div>
                    <canvas id="moduleChart"></canvas>
                </div>
                <small style="color: var(--muted);">Page views over time for module pages</small>
            </div>

            <!-- Top Countries/Pages -->
            <div class="chart-section">
                <div class="chart-header">
                    <h3 class="chart-title">🌍 Top Geography & Pages</h3>
                    <div class="chart-toggle">
                        <button class="toggle-btn active" onclick="toggleGeographyView('countries')">Countries</button>
                        <button class="toggle-btn" onclick="toggleGeographyView('pages')">Pages</button>
                    </div>
                </div>
                <div class="chart-container tall">
                    <div class="loading-spinner" id="geoSpinner">
                        <div class="spinner"></div>
                    </div>
                    <canvas id="geographyChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js & Export Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        // ════════════════════════════════════════════════════════════
        // GLOBAL STATE & CHART INSTANCES
        // ════════════════════════════════════════════════════════════
        const chartInstances = {};
        let currentPreset = 30;
        let analyticsView = 'device';
        let geographyView = 'countries';

        // ════════════════════════════════════════════════════════════
        // INITIALIZATION
        // ════════════════════════════════════════════════════════════
        document.addEventListener('DOMContentLoaded', function() {
            // Set today's date as default for date inputs
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('endDate').value = today;
            document.getElementById('startDate').value = new Date(Date.now() - 30 * 24 * 60 * 60 * 1000).toISOString().split('T')[0];

            // Load initial metrics
            loadMetrics();

            // Setup preset button listeners
            document.querySelectorAll('.btn-preset').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.btn-preset').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    currentPreset = parseInt(this.getAttribute('data-preset'));
                    clearDateInputs();
                    loadMetrics();
                });
            });
        });

        // ════════════════════════════════════════════════════════════
        // LOAD METRICS & UPDATE CHARTS
        // ════════════════════════════════════════════════════════════
        async function loadMetrics() {
            // Show loading spinners
            document.querySelectorAll('.loading-spinner').forEach(el => el.classList.add('active'));

            try {
                const params = new URLSearchParams();
                
                const startDateInput = document.getElementById('startDate').value;
                const endDateInput = document.getElementById('endDate').value;

                if (startDateInput && endDateInput) {
                    params.append('start_date', startDateInput);
                    params.append('end_date', endDateInput);
                } else {
                    params.append('preset', currentPreset);
                }

                const response = await fetch(`/admins/dashboard/metrics?${params.toString()}`);
                const data = await response.json();

                if (!response.ok) {
                    console.error('Error loading metrics:', data);
                    showError('Failed to load dashboard metrics');
                    return;
                }

                // Update all components
                updateKpiCards(data.kpi);
                updateBlogChart(data.blogPerformance);
                updateEhsChart(data.ehsAssessments);
                updateVisitorChart(data.visitorAnalytics, analyticsView);
                updateModuleChart(data.moduleEngagement);
                updateGeographyChart(data.topGeography, geographyView);

                // Store data for exports
                window.dashboardData = data;

            } catch (error) {
                console.error('Error loading metrics:', error);
                showError('Failed to load dashboard metrics');
            } finally {
                // Hide loading spinners
                document.querySelectorAll('.loading-spinner').forEach(el => el.classList.remove('active'));
            }
        }

        // ════════════════════════════════════════════════════════════
        // UPDATE KPI CARDS
        // ════════════════════════════════════════════════════════════
        function updateKpiCards(kpiData) {
            const container = document.getElementById('kpiContainer');
            container.innerHTML = '';

            const colorMap = {
                'blue': 'blue',
                'green': 'green',
                'orange': 'orange',
                'purple': 'purple'
            };

            Object.values(kpiData).forEach(metric => {
                const colorClass = colorMap[metric.color] || 'blue';
                const icon = getIcon(metric.icon);
                const growthClass = metric.growth >= 0 ? 'positive' : 'negative';
                const growthSymbol = metric.growth >= 0 ? '↑' : '↓';

                const card = document.createElement('div');
                card.className = `kpi-card ${colorClass}`;
                card.innerHTML = `
                    <div class="kpi-header">
                        <div>
                            <div class="kpi-value">${metric.value}</div>
                            <div class="kpi-label">${metric.label}</div>
                            ${metric.growth !== undefined ? `
                                <div class="kpi-growth ${growthClass}">
                                    ${growthSymbol} ${Math.abs(metric.growth)}% vs period
                                </div>
                            ` : ''}
                        </div>
                        <div class="kpi-icon">${icon}</div>
                    </div>
                    ${metric.pageViews ? `<small style="color: var(--muted);">${metric.pageViews} page views</small>` : ''}
                `;
                container.appendChild(card);
            });
        }

        function getIcon(iconName) {
            const icons = {
                'book': '📖',
                'check-circle': '✅',
                'package': '📦',
                'users': '👥',
            };
            return icons[iconName] || '📊';
        }

        // ════════════════════════════════════════════════════════════
        // UPDATE CHARTS
        // ════════════════════════════════════════════════════════════
        function updateBlogChart(data) {
            const ctx = document.getElementById('blogChart').getContext('2d');
            
            if (chartInstances.blog) {
                chartInstances.blog.destroy();
            }

            const colors = {
                blue: '#1D5FC4',
                orange: '#D97706'
            };

            chartInstances.blog = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [
                        {
                            label: 'New Blog Posts',
                            data: data.newPosts,
                            backgroundColor: colors.blue,
                            borderColor: colors.blue,
                            borderWidth: 0,
                            borderRadius: 4,
                            yAxisID: 'y',
                            order: 2
                        },
                        {
                            label: 'Blog Page Views',
                            data: data.views,
                            borderColor: colors.orange,
                            backgroundColor: 'transparent',
                            borderWidth: 2.5,
                            fill: false,
                            tension: 0.4,
                            type: 'line',
                            yAxisID: 'y1',
                            order: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                fontFamily: "'DM Sans', sans-serif",
                                fontSize: 13,
                                color: '#0C1524',
                                padding: 16,
                                usePointStyle: true
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(12, 21, 36, 0.9)',
                            titleFont: { size: 12, family: "'DM Sans', sans-serif" },
                            bodyFont: { size: 12, family: "'DM Sans', sans-serif" },
                            padding: 12,
                            borderRadius: 8,
                            displayColors: true
                        }
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            ticks: { color: '#637693' },
                            grid: { color: '#E3EAF3', drawBorder: false }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            ticks: { color: '#637693' },
                            grid: { drawOnChartArea: false },
                            title: { display: true, text: 'Views' }
                        },
                        x: {
                            ticks: { color: '#637693' },
                            grid: { color: '#E3EAF3', drawBorder: false }
                        }
                    }
                }
            });
        }

        function updateEhsChart(data) {
            const ctx = document.getElementById('ehsChart').getContext('2d');
            
            if (chartInstances.ehs) {
                chartInstances.ehs.destroy();
            }

            chartInstances.ehs = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Assessments',
                        data: data.data,
                        backgroundColor: data.colors,
                        borderWidth: 0,
                        borderRadius: 6
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(12, 21, 36, 0.9)',
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.x + ' assessments';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: { color: '#637693' },
                            grid: { color: '#E3EAF3' }
                        },
                        y: {
                            ticks: { color: '#0C1524', font: { weight: 600 } },
                            grid: { display: false }
                        }
                    }
                }
            });
        }

        function updateVisitorChart(data, viewType) {
            const ctx = document.getElementById('visitorChart').getContext('2d');
            
            if (chartInstances.visitor) {
                chartInstances.visitor.destroy();
            }

            const chartData = viewType === 'device' ? data.devices : data.browsers;

            chartInstances.visitor = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        data: chartData.data,
                        backgroundColor: chartData.colors,
                        borderColor: '#FFFFFF',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                fontFamily: "'DM Sans', sans-serif",
                                fontSize: 13,
                                color: '#0C1524',
                                padding: 16,
                                usePointStyle: true
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(12, 21, 36, 0.9)',
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
        }

        function updateModuleChart(data) {
            const ctx = document.getElementById('moduleChart').getContext('2d');
            
            if (chartInstances.module) {
                chartInstances.module.destroy();
            }

            chartInstances.module = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.timeline.labels,
                    datasets: [{
                        label: 'Module Page Views',
                        data: data.timeline.data,
                        borderColor: '#7C3AED',
                        backgroundColor: 'rgba(124, 58, 237, 0.1)',
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#7C3AED',
                        pointBorderColor: '#FFFFFF',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            labels: { fontFamily: "'DM Sans', sans-serif", fontSize: 13, color: '#0C1524' }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(12, 21, 36, 0.9)',
                            callbacks: {
                                label: function(context) {
                                    return 'Views: ' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: { color: '#637693' },
                            grid: { color: '#E3EAF3' }
                        },
                        x: {
                            ticks: { color: '#637693' },
                            grid: { color: '#E3EAF3' }
                        }
                    }
                }
            });
        }

        function updateGeographyChart(data, viewType) {
            const ctx = document.getElementById('geographyChart').getContext('2d');
            
            if (chartInstances.geography) {
                chartInstances.geography.destroy();
            }

            const chartData = viewType === 'countries' ? data.countries : data.pages;

            chartInstances.geography = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: viewType === 'countries' ? 'Sessions' : 'Views',
                        data: chartData.data,
                        backgroundColor: '#1D5FC4',
                        borderRadius: 4
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(12, 21, 36, 0.9)',
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.x;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: { color: '#637693' },
                            grid: { color: '#E3EAF3' }
                        },
                        y: {
                            ticks: { color: '#0C1524', font: { size: 12 } },
                            grid: { display: false }
                        }
                    }
                }
            });
        }

        // ════════════════════════════════════════════════════════════
        // FILTER INTERACTIONS
        // ════════════════════════════════════════════════════════════
        function clearDateInputs() {
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
        }

        function applyCustomDateRange() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates');
                return;
            }

            if (new Date(startDate) > new Date(endDate)) {
                alert('Start date must be before end date');
                return;
            }

            document.querySelectorAll('.btn-preset').forEach(b => b.classList.remove('active'));
            loadMetrics();
        }

        function toggleAnalyticsView(view) {
            analyticsView = view;
            const visitorToggleGroup = document.querySelectorAll('.chart-toggle')[0];
            visitorToggleGroup.querySelectorAll('.toggle-btn').forEach((btn, i) => {
                btn.classList.toggle('active', (i === 0 && view === 'device') || (i === 1 && view === 'browser'));
            });
            if (window.dashboardData) {
                updateVisitorChart(window.dashboardData.visitorAnalytics, analyticsView);
            }
        }

        function toggleGeographyView(view) {
            geographyView = view;
            const geographyToggleGroup = document.querySelectorAll('.chart-toggle')[1];
            geographyToggleGroup.querySelectorAll('.toggle-btn').forEach((btn, i) => {
                btn.classList.toggle('active', (i === 0 && view === 'countries') || (i === 1 && view === 'pages'));
            });
            if (window.dashboardData) {
                updateGeographyChart(window.dashboardData.topGeography, geographyView);
            }
        }

        function refreshMetrics() {
            loadMetrics();
        }

        // ════════════════════════════════════════════════════════════
        // EXPORT TO PDF
        // ════════════════════════════════════════════════════════════
        async function exportDashboardPDF(event) {
            const { jsPDF } = window.jspdf;
            const element = document.querySelector('.container-fluid');

            // Show a message
            const exportBtn = event.currentTarget.closest('.btn-export');
            const originalText = exportBtn.innerHTML;
            exportBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Generating PDF...';
            exportBtn.disabled = true;

            try {
                const canvas = await html2canvas(element, {
                    scale: 2,
                    useCORS: true,
                    backgroundColor: '#F7FAFD'
                });

                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                const imgData = canvas.toDataURL('image/png');
                const imgWidth = 210; // A4 width in mm
                const pageHeight = 297; // A4 height in mm
                let heightLeft = canvas.height * imgWidth / canvas.width;
                let position = 0;

                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, canvas.height * imgWidth / canvas.width);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - canvas.height * imgWidth / canvas.width;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, canvas.height * imgWidth / canvas.width);
                    heightLeft -= pageHeight;
                }

                pdf.save('Dashboard-' + new Date().toISOString().split('T')[0] + '.pdf');
            } catch (error) {
                console.error('Error exporting PDF:', error);
                alert('Error exporting PDF. Check console for details.');
            } finally {
                exportBtn.innerHTML = originalText;
                exportBtn.disabled = false;
            }
        }

        // ════════════════════════════════════════════════════════════
        // ERROR HANDLING
        // ════════════════════════════════════════════════════════════
        function showError(message) {
            const container = document.getElementById('kpiContainer');
            container.innerHTML = `<div class="empty-state"><p>⚠️ ${message}</p></div>`;
        }
    </script>
@endsection
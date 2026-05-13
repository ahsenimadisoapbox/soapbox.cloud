@extends('layouts.backend')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Visitor Analytics</h2>
        <p class="text-muted mb-0">Live user tracking, page visits, devices, location signals, and engagement time.</p>
    </div>

    <form method="GET" class="d-flex gap-2">
        <select name="days" class="form-select" onchange="this.form.submit()">
            <option value="7" {{ $days === 7 ? 'selected' : '' }}>Last 7 days</option>
            <option value="30" {{ $days === 30 ? 'selected' : '' }}>Last 30 days</option>
            <option value="90" {{ $days === 90 ? 'selected' : '' }}>Last 90 days</option>
        </select>
    </form>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-modern p-3 h-100">
            <span class="text-muted">Page Views</span>
            <h3 class="mb-0">{{ number_format($totalPageViews) }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-3 h-100">
            <span class="text-muted">Unique Visitors</span>
            <h3 class="mb-0">{{ number_format($uniqueVisitors) }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-3 h-100">
            <span class="text-muted">Avg. Time</span>
            <h3 class="mb-0">{{ gmdate('i:s', $averageDuration) }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-3 h-100">
            <span class="text-muted">Active Today</span>
            <h3 class="mb-0">{{ number_format($activeToday) }}</h3>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card card-modern h-100">
            <div class="card-header">
                <h5 class="mb-0">Top Pages</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Page</th>
                            <th>Views</th>
                            <th>Avg. Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topPages as $page)
                            <tr>
                                <td>{{ $page->page_path }}</td>
                                <td>{{ number_format($page->views) }}</td>
                                <td>{{ gmdate('i:s', (int) $page->avg_duration) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">No tracking data yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-modern h-100">
            <div class="card-header">
                <h5 class="mb-0">Device Breakdown</h5>
            </div>
            <div class="card-body">
                @forelse($deviceBreakdown as $device)
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span class="text-capitalize">{{ $device->device_type ?: 'Unknown' }}</span>
                        <strong>{{ number_format($device->total) }}</strong>
                    </div>
                @empty
                    <p class="text-muted mb-0">No device data yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="card card-modern">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Complete Visit Log</h5>
        <span class="badge bg-primary">{{ $recentVisits->total() }} Records</span>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Time</th>
                    <th>Page</th>
                    <th>Visitor</th>
                    <th>Device</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th>Referrer</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentVisits as $visit)
                    <tr>
                        <td>
                            {{ optional($visit->started_at)->format('d M Y') }}<br>
                            <small class="text-muted">{{ optional($visit->started_at)->format('h:i A') }}</small>
                        </td>
                        <td style="min-width: 220px;">
                            <strong>{{ Str::limit($visit->page_title ?: $visit->page_path, 55) }}</strong><br>
                            <small class="text-muted">{{ $visit->page_path }}</small>
                        </td>
                        <td>
                            <code>{{ $visit->session->ip_address ?? '-' }}</code><br>
                            <small class="text-muted">{{ Str::limit($visit->session->session_key ?? '-', 14, '') }}</small>
                        </td>
                        <td>
                            <span class="badge bg-secondary text-capitalize">{{ $visit->session->device_type ?? 'unknown' }}</span><br>
                            <small class="text-muted">
                                {{ $visit->session->browser ?? 'Unknown' }} / {{ $visit->session->os ?? 'Unknown' }}
                            </small><br>
                            <small class="text-muted">{{ $visit->session->device_name ?? '-' }}</small>
                        </td>
                        <td>
                            {{ $visit->session->country_code ?? 'N/A' }}<br>
                            <small class="text-muted">{{ $visit->session->timezone ?? '-' }}</small>
                        </td>
                        <td>{{ gmdate('i:s', (int) $visit->duration_seconds) }}</td>
                        <td style="max-width: 240px;">
                            <small class="text-muted">{{ Str::limit($visit->referrer ?: 'Direct', 80) }}</small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No visit logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $recentVisits->links() }}
    </div>
</div>
@endsection

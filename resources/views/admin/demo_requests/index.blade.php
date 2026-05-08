@extends('layouts.backend')

@section('content')
<div class="card card-modern">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Demo Requests</h4>
        <span class="badge bg-primary">{{ $demoRequests->count() }} Records</span>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Company</th>
                    <th>Industry</th>
                    <th>Role</th>
                    <th>Challenge</th>
                    <th>Source</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                @forelse($demoRequests as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>

                        <!-- Name -->
                        <td>
                            <strong>{{ $item->first_name }} {{ $item->last_name }}</strong><br>
                            <small class="text-muted">{{ $item->country }}</small>
                        </td>

                        <!-- Contact -->
                        <td>
                            <div>{{ $item->email }}</div>
                            <small class="text-muted">{{ $item->phone }}</small>
                        </td>

                        <!-- Company -->
                        <td>{{ $item->company }}</td>

                        <!-- Industry -->
                        <td>
                            <span class="badge bg-info">
                                {{ $item->industry ?? 'N/A' }}
                            </span>
                        </td>

                        <!-- Role -->
                        <td>{{ $item->role ?? '-' }}</td>

                        <!-- Challenge -->
                        <td style="max-width: 200px;">
                            <small>
                                {{ Str::limit($item->challenge, 50) }}
                            </small>
                        </td>

                        <!-- Source -->
                        <td>
                            <span class="badge bg-secondary">
                                {{ $item->source ?? 'Direct' }}
                            </span>
                        </td>

                        <!-- Created -->
                        <td>
                            {{ $item->created_at->format('d M Y') }}<br>
                            <small class="text-muted">
                                {{ $item->created_at->format('h:i A') }}
                            </small>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No demo requests found
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection
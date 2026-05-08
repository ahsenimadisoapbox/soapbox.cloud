@extends('layouts.backend')

@section('content')
    <div class="card card-modern">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">EHS Assessments</h4>
            <span class="badge bg-primary">{{ $assessments->count() }} Records</span>
        </div>

        <div class="card-body table-responsive">

            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Industry</th>
                        <th>Employees</th>
                        <th>Schedule</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($assessments as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <!-- User Info -->
                            <td>
                                <strong>{{ $item->name }}</strong><br>
                                <small class="text-muted">{{ $item->role }}</small>
                            </td>

                            <!-- Company -->
                            <td>
                                <strong>{{ $item->company }}</strong><br>
                                <small class="text-muted">{{ $item->country }}</small>
                            </td>

                            <!-- Contact -->
                            <td>
                                <div>{{ $item->email }}</div>
                                <small class="text-muted">{{ $item->phone }}</small>
                            </td>

                            <!-- Industry -->
                            <td>{{ $item->industry ?? '-' }}</td>

                            <!-- Employees -->
                            <td>
                                <span class="badge bg-info">
                                    {{ $item->employees ?? 'N/A' }}
                                </span>
                            </td>

                            <!-- Schedule -->
                            <td>
                                @if($item->schedule)
                                    <span class="badge bg-success">
                                        {{ \Carbon\Carbon::parse($item->schedule)->format('d M Y') }}
                                    </span>
                                @else
                                    <span class="text-muted">Not set</span>
                                @endif
                            </td>

                            <!-- Created -->
                            <td>
                                {{ $item->created_at->format('d M Y') }}<br>
                                <small class="text-muted">
                                    {{ $item->created_at->format('h:i A') }}
                                </small>
                            </td>

                            <!-- Actions -->
                            <td>
                                <a href="{{ route('admin.ehs_assessments.show', $item->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                No records found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection
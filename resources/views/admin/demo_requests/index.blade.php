@extends('layouts.backend')

@section('content')
<div class="card card-modern">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Demo Requests</h4>
        <span class="badge bg-primary">{{ $demoRequests->count() }} Records</span>
        <div class="d-flex gap-2">
            <span class="badge bg-warning">
                Pending: {{ $demoRequests->where('status','pending')->count() }}
            </span>
            
            <span class="badge bg-success">
                Completed: {{ $demoRequests->where('status','completed')->count() }}
            </span>
        </div>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Industry</th>
                    <th>Primary Interest</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($demoRequests as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <strong>{{ $item->full_name }}</strong>
                    </td>
                    <td>
                        {{ $item->email }}
                    </td>
                    <td>
                        {{ $item->company_name }}
                    </td>

                    <td>
                        <span class="badge bg-info">
                            {{ $item->industry }}
                        </span>
                    </td>

                    <td>
                        {{ $item->primary_interest }}
                    </td>

                    <td>
                        <form
                            action="{{ route('admin.demo.status', $item->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <select
                                name="status"
                                onchange="this.form.submit()"
                                class="form-select form-select-sm">

                                <option value="pending"
                                    {{ $item->status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="scheduled"
                                    {{ $item->status == 'scheduled' ? 'selected' : '' }}>
                                    Demo Scheduled
                                </option>

                                <option value="completed"
                                    {{ $item->status == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>

                                <option value="not_interested"
                                    {{ $item->status == 'not_interested' ? 'selected' : '' }}>
                                    Not Interested
                                </option>

                            </select>

                        </form>

                    </td>

                    <td>
                        {{ $item->created_at->format('d M Y') }}
                    </td>

                    <td>
                        <a href="{{ route('admin.demo.show', $item->id) }}"
                        class="btn btn-sm btn-primary">

                            View

                        </a>

                    </td>

                </tr>
                @empty

                <tr>
                    <td colspan="9"
                        class="text-center text-muted">

                        No demo requests found

                    </td>
                </tr>

                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection
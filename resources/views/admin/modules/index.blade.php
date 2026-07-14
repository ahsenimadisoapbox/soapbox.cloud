@extends('layouts.backend')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Modules</h4>
        <a href="{{ route('admin.modules.create') }}" class="btn btn-primary">
            Add Module
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Live Status</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($modules as $key => $module)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $module->name }}</td>

                            <td>
                                <span class="badge bg-dark">
                                    {{ $module->category->name ?? 'No Category' }}
                                </span>
                            </td>

                            <td>
                                <span class="badge {{ $module->is_live ? 'bg-success' : 'bg-warning' }}">
                                    {{ $module->is_live ? 'Live' : 'Coming Soon' }}
                                </span>
                            </td>

                            <td>
                                <span class="badge {{ $module->status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ $module->status == '1' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('modules.show', $module->slug) }}"
                                       class="btn btn-info btn-sm"
                                       target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.modules.edit', $module->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.modules.destroy', $module->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No modules found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
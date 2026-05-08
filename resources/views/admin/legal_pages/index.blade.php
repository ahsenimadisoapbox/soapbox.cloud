@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h2>Legal Pages</h2>
        <a href="{{ route('admin.legal-pages.create') }}" class="btn btn-primary">
            Add Legal Page
        </a>
    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <span class="badge {{ $page->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $page->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.legal-pages.edit', $page) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.legal-pages.destroy', $page) }}"
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this page?')"
                                    class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Blogs</h2>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add Blog</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Created At</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $blog->title }}</td>
                <td>
                    @if($blog->image)
                        <img src="{{ asset($blog->image) }}" width="120" class="mb-2">
                    @endif
                </td>
                <td>
                    @if($blog->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>{{ $blog->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }}</td>
                <td>
                    @if ($blog->status)
                        <a href="{{route('blogs.show', $blog->slug)}}" class="btn btn-sm btn-info">View</a>
                    @endif
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this blog?')" class="btn btn-sm btn-danger">
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

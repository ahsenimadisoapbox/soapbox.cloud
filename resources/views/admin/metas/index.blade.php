@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Meta Tags</h2>
        <a href="{{ route('admin.metas.create') }}" class="btn btn-primary">Add Meta</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Page</th>
                <th>Meta Title</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metas as $meta)
            <tr>
                <td>{{ $meta->page }}</td>
                <td>{{ Str::limit($meta->meta_title, 50) }}</td>
                <td>
                    <a href="{{ route('admin.metas.edit', $meta) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.metas.destroy', $meta) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this meta?')" class="btn btn-danger btn-sm">
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

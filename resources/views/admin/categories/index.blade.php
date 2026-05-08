@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Categories</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            + Add Category
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $key => $item)
                    <tr>
                        <td>{{ $categories->firstItem() + $key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.categories.destroy', $item->id) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this category?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $categories->links() }}

        </div>
    </div>

</div>

@endsection
@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <h4 class="mb-3">Edit Category</h4>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $category->name) }}">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order"
                           class="form-control @error('sort_order') is-invalid @enderror"
                           value="{{ old('sort_order', $category->sort_order) }}">

                    @error('sort_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-primary">Update</button>
                </div>

            </div>
        </div>

    </form>

</div>

@endsection
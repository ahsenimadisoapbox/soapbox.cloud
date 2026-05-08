@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Edit Meta Tags</h2>

    <form action="{{ route('admin.metas.update', $meta) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Page</label>
            <input type="text" name="page" class="form-control"
                   value="{{ old('page', $meta->page) }}" required>
        </div>

        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control"
                   value="{{ old('meta_title', $meta->meta_title) }}">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $meta->meta_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords" class="form-control" rows="3">{{ old('meta_keywords', $meta->meta_keywords) }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.metas.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

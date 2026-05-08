@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Add Meta Tags</h2>

    <form action="{{ route('admin.metas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Page (unique key)</label>
            <input type="text" name="page" class="form-control" placeholder="home, blogs, careers" required>
        </div>

        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.metas.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

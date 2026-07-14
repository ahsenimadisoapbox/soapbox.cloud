@extends('layouts.backend')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Upload Media</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Image *</label>
                <input type="file" name="image" class="form-control" required>
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label>Alt Text</label>
                <input type="text" name="alt" class="form-control" value="{{ old('alt') }}">
            </div>
            <div class="mb-3">
                <label>Redirect URL</label>
                <input type="url"
                    name="redirect_url"
                    class="form-control"
                    placeholder="https://example.com">
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>

@endsection

@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Add Blog</h2>

    {{-- GLOBAL ERROR MESSAGE --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- TITLE --}}
        <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text"
                   name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">

            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- SHORT DESCRIPTION --}}
        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="short_description"
                      class="form-control @error('short_description') is-invalid @enderror"
                      rows="3">{{ old('short_description') }}</textarea>

            @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- CONTENT --}}
        <div class="mb-3">
            <label class="form-label">Content <span class="text-danger">*</span></label>

            @include('partials.editor', [
                'name' => 'content',
                'id' => 'blog_content',
                'value' => old('content'),
                'required' => true
            ])

            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            {{-- IMAGE --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Image</label>
                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror">
    
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- IMAGE ALT TEXT --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Image Alt Text</label>
                <input type="text"
                       name="image_alt"
                       class="form-control @error('image_alt') is-invalid @enderror"
                       value="{{ old('image_alt') }}">
    
                @error('image_alt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>


        {{-- STATUS --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status"
                    class="form-control @error('status') is-invalid @enderror">
                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>

            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- SEO META --}}
        <hr>
        <h5>SEO Meta</h5>

        <div class="mb-3">
            <label class="form-label">Meta Title</label>
            <input type="text"
                   name="meta_title"
                   class="form-control @error('meta_title') is-invalid @enderror"
                   value="{{ old('meta_title') }}">

            @error('meta_title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description"
                      class="form-control @error('meta_description') is-invalid @enderror"
                      rows="3">{{ old('meta_description') }}</textarea>

            @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Keywords</label>
            <textarea name="meta_keywords"
                      class="form-control @error('meta_keywords') is-invalid @enderror"
                      rows="2">{{ old('meta_keywords') }}</textarea>

            @error('meta_keywords')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Save Blog</button>
    </form>
</div>
@endsection

@push('scripts')

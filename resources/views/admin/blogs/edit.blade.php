@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Edit Blog</h2>
    
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

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control">{{ $blog->short_description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Content <span class="text-danger">*</span>
            </label>
            <div class="rich-editor"
                data-id="blog_content"
                data-name="content"
                data-value="{{ old('content', $blog->content) }}">

            </div>

            

            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">
                Mobile Content <span class="text-danger">*</span>
            </label>

            @include('partials.editor', [
                'name' => 'mobile_content',
                'id' => 'blog_mobile_content',
                'value' => old('mobile_content', $blog->mobile_content),
                'required' => true
            ])

            @error('mobile_content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                
                    <label>Author</label>
                    <input type="text" name="author" value="{{ $blog->author }}" class="form-control">
                

            </div>
            <div class="col-md-6">
                
                    <label>Role</label>
                    <input type="text" name="role" value="{{ $blog->role }}" class="form-control">
                

            </div>
        </div>
        <div class="mb-3">
            <label>LinkedIn URL</label>
            <input type="url" name="linkedin" value="{{ $blog->linkedin }}" class="form-control">
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Image</label><br>
                    <div class="d-flex align-items-center gap-1">
                        @if($blog->image)
                            <img src="{{ asset($blog->image) }}" width="50">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>Image Alt Text</label>
                    <input type="text" name="image_alt" value="{{ $blog->image_alt }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $blog->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$blog->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <hr>
        <h5>SEO Meta</h5>

        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control"
                value="{{ old('meta_title', $blog->meta_title ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords" class="form-control" rows="2">{{ old('meta_keywords', $blog->meta_keywords ?? '') }}</textarea>
        </div>

        <button class="btn btn-primary">Update Blog</button>
    </form>
</div>
@endsection
@push('scripts')

<!-- CKEditor 5 Free CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            placeholder: 'Write blog content here...'
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endpush

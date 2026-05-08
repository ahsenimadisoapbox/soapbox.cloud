@extends('layouts.backend')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Legal Page</h2>

    <form action="{{ route('admin.legal-pages.update', $legalPage) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- PAGE DETAILS --}}
        <h5 class="mb-3">Page Details</h5>

        <div class="mb-3">
            <label class="form-label">Page Name <span class="text-danger">*</span></label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $legalPage->name) }}"
                   required>
        </div>

        {{-- CONTENT --}}
        <div class="mb-4">
            <label class="form-label">Content <span class="text-danger">*</span></label>
            @include('partials.editor', [
                'name' => 'content',
                'id' => 'content',
                'value' => old('content', $legalPage->content),
                'required' => true
            ])
        </div>

        {{-- STATUS --}}
        <div class="mb-4">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $legalPage->status) == 1 ? 'selected' : '' }}>
                    Active
                </option>
                <option value="0" {{ old('status', $legalPage->status) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div>

        {{-- SEO META --}}
        <hr>
        <h5 class="mb-3">SEO Meta</h5>

        <div class="mb-3">
            <label class="form-label">Meta Title</label>
            <input type="text"
                   name="meta_title"
                   class="form-control"
                   value="{{ old('meta_title', $legalPage->meta_title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description"
                      class="form-control"
                      rows="3">{{ old('meta_description', $legalPage->meta_description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Meta Keywords</label>
            <textarea name="meta_keywords"
                      class="form-control"
                      rows="2">{{ old('meta_keywords', $legalPage->meta_keywords) }}</textarea>
        </div>

        {{-- ACTIONS --}}
        <button class="btn btn-primary">Update Legal Page</button>
        <a href="{{ route('admin.legal-pages.index') }}" class="btn btn-secondary ms-2">
            Back
        </a>
    </form>
</div>
@endsection

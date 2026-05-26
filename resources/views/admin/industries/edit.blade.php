@extends('layouts.backend')

@section('content')

<div class="container">

    <h2>Edit Industry</h2>

    <form action="{{ route('admin.industries.update', $industry->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $industry->title }}">
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text"
                   name="subtitle"
                   class="form-control"
                   value="{{ $industry->subtitle }}">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="6">{{ $industry->description }}</textarea>
        </div>

        <div class="mb-3">

            <label>Current Image</label>

            <br>

            @if($industry->image)

                <img src="{{ asset($industry->image) }}"
                     width="120"
                     class="mb-2">

            @endif

        </div>

        <div class="mb-3">
            <label>Upload New Image</label>

            <input type="file"
                   name="image"
                   class="form-control">
        </div>
        <div class="mb-3">

            <label>Icon Class</label>

            <input type="text"
                name="icon"
                class="form-control"
                value="{{ $industry->icon }}">

        </div>

        <div class="mb-3">
            <label>Section Title</label>

            <input type="text"
                   name="section_title"
                   class="form-control"
                   value="{{ $industry->section_title }}">
        </div>

        <div class="mb-3">
            <label>Section Description</label>

            <textarea name="section_description"
                      class="form-control"
                      rows="4">{{ $industry->section_description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Meta Title</label>

            <input type="text"
                   name="meta_title"
                   class="form-control"
                   value="{{ $industry->meta_title }}">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>

            <textarea name="meta_description"
                      class="form-control"
                      rows="4">{{ $industry->meta_description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Meta Keywords</label>

            <textarea name="meta_keywords"
                      class="form-control"
                      rows="3">{{ $industry->meta_keywords }}</textarea>
        </div>

        <button class="btn btn-success">
            Update Industry
        </button>

    </form>

</div>

@endsection
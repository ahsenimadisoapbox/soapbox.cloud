@extends('layouts.backend')

@section('content')

<div class="container">

    <h2>Add Industry</h2>

    <form action="{{ route('admin.industries.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <div class="mb-3">

            <label>Icon Class</label>

            <input type="text"
                name="icon"
                class="form-control"
                placeholder="bi bi-buildings">

            <small class="text-muted">

                Example:
                bi bi-buildings

            </small>

        </div>

        <div class="mb-3">
            <label>Section Title</label>
            <input type="text"
                   name="section_title"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Section Description</label>
            <textarea name="section_description"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text"
                   name="meta_title"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords"
                      class="form-control"></textarea>
        </div>

        <button class="btn btn-success">
            Submit
        </button>

    </form>

</div>

@endsection
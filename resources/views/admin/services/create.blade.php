@extends('layouts.backend')

@section('content')

<div class="container">

    <h2>Add Service</h2>

    <form action="{{ route('admin.services.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Industry</label>

            <select name="industry_id" class="form-control">

                @foreach($industries as $industry)

                    <option value="{{ $industry->id }}">
                        {{ $industry->title }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control">
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

        <button class="btn btn-success">
            Submit
        </button>

    </form>

</div>

@endsection
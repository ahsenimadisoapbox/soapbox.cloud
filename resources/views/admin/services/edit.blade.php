@extends('layouts.backend')

@section('content')

<div class="container">

    <h2>Edit Service</h2>

    <form action="{{ route('admin.services.update', $service->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Industry</label>

            <select name="industry_id"
                    class="form-control">

                @foreach($industries as $industry)

                    <option value="{{ $industry->id }}"
                        {{ $service->industry_id == $industry->id ? 'selected' : '' }}>

                        {{ $industry->title }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Title</label>

            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $service->title }}">

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="6">{{ $service->description }}</textarea>

        </div>

        <div class="mb-3">

            <label>Current Image</label>

            <br>

            @if($service->image)

                <img src="{{ asset($service->image) }}"
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

        <button class="btn btn-success">

            Update Service

        </button>

    </form>

</div>

@endsection
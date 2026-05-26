@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <h2>{{ $industry->title }}</h2>

        <a href="{{ route('admin.industries.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

    <div class="card">

        <div class="card-body">

            @if($industry->image)

                <img src="{{ asset($industry->image) }}"
                     width="250"
                     class="mb-4 rounded">

            @endif

            <h4>Subtitle</h4>

            <p>{{ $industry->subtitle }}</p>

            <hr>

            <h4>Description</h4>

            <div>{!! $industry->description !!}</div>

            <hr>

            <h4>Section Title</h4>

            <p>{{ $industry->section_title }}</p>

            <hr>

            <h4>Section Description</h4>

            <p>{{ $industry->section_description }}</p>

            <hr>

            <h4>Meta Title</h4>

            <p>{{ $industry->meta_title }}</p>

            <hr>

            <h4>Meta Description</h4>

            <p>{{ $industry->meta_description }}</p>

            <hr>

            <h4>Meta Keywords</h4>

            <p>{{ $industry->meta_keywords }}</p>

            <hr>

            <h4>Slug</h4>

            <p>{{ $industry->slug }}</p>

        </div>

    </div>

</div>

@endsection
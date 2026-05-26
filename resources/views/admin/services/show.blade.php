@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <h2>{{ $service->title }}</h2>

        <a href="{{ route('admin.services.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

    <div class="card">

        <div class="card-body">

            @if($service->image)

                <img src="{{ asset($service->image) }}"
                     width="250"
                     class="mb-4 rounded">

            @endif

            <h4>Industry</h4>

            <p>{{ $service->industry->title ?? 'N/A' }}</p>

            <hr>

            <h4>Description</h4>

            <div>{!! $service->description !!}</div>

            <hr>

            <h4>Slug</h4>

            <p>{{ $service->slug }}</p>

        </div>

    </div>

</div>

@endsection
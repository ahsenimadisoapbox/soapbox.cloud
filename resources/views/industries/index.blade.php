@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <h1>Industries</h1>

    <div class="row">

        @foreach($industries as $industry)

        <div class="col-md-4 mb-4">

            <div class="card">

                <img src="{{ asset($industry->image) }}"
                     class="card-img-top">

                <div class="card-body">

                    <h4>{{ $industry->title }}</h4>

                    <p>{{ $industry->subtitle }}</p>

                    <a href="/industries/{{ $industry->slug }}"
                       class="btn btn-primary">

                        View Details

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
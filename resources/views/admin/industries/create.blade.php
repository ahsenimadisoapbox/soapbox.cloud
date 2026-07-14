@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">
                Add Industry
            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.industries.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @include('admin.industries.form')

            </form>

        </div>

    </div>

</div>

@endsection
@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>Create Popup</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.popups.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.popups.form')

            </form>

        </div>

    </div>

</div>

@endsection
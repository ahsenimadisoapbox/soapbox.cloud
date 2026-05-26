@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>Edit Popup</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.popups.update', $popup->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.popups.form')

            </form>

        </div>

    </div>

</div>

@endsection
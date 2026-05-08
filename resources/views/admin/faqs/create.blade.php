@extends('layouts.backend')

@section('content')
<div class="container-fluid py-4">

    <h4 class="mb-3">Add FAQ</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf

                @include('admin.faqs.form')

                <button class="btn btn-success">Save</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>

</div>
@endsection
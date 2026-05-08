@extends('layouts.backend')

@section('content')
<div class="container-fluid py-4">

    <h4 class="mb-3">Edit FAQ</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.faqs.form', ['faq' => $faq])

                <button class="btn btn-success">Update</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>

</div>
@endsection
@extends('layouts.backend')

@section('content')

<form
    action="{{ route('ehs-ai-modules.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @include(
        'admin.ehs-ai-modules.form'
    )

</form>

@endsection
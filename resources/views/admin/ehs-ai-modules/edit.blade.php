@extends('layouts.backend')

@section('content')

<form
    action="{{ route('ehs-ai-modules.update',$ehsAiModule) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include(
        'admin.ehs-ai-modules.form'
    )

</form>

@endsection
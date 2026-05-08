@extends('layouts.backend')

@section('content')
<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Create Module</h4>
</div>
<form action="{{ route('admin.modules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.modules.form')
</form>
@endsection
@extends('layouts.backend')

@section('content')
<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Edit Module</h4>
</div>
<form action="{{ route('admin.modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.modules.form')
</form>
@endsection
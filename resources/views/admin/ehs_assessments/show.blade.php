@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Assessment Details</h4>

    <!-- Contact Info -->
    <div class="card card-modern mb-3 p-3">
        <h5>Contact Info</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $item->name }}</p>
                <p><strong>Email:</strong> {{ $item->email }}</p>
                <p><strong>Phone:</strong> {{ $item->phone }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Company:</strong> {{ $item->company }}</p>
                <p><strong>Role:</strong> {{ $item->role }}</p>
                <p><strong>Preferred demo date:</strong> {{ $item->schedule }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <!-- Section 1 -->
            <div class="card card-modern h-100 p-3">
                <h5>Organization Overview</h5>
                <p><strong>Industry:</strong> {{ $item->industry }}</p>
                <p><strong>Employees:</strong> {{ $item->employees }}</p>
                <p><strong>Sites:</strong> {{ $item->sites }}</p>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <!-- Section 2 -->
            <div class="card card-modern h-100 p-3">
                <h5>Processes</h5>
                <p><strong>Tool:</strong> {{ $item->tool }}</p>
                <p><strong>Reporting:</strong> {{ $item->reporting }}</p>
            </div>
        </div>
    </div>

    <!-- Arrays -->
    <div class="card card-modern mb-3 p-3">
        <h5>Problems</h5>
        <div class="row">
            @if($item->problems)
                @foreach($item->problems as $problem)
                    <div class="col-md-2 mb-1">
                        <span class="badge bg-danger">{{ $problem }}</span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection
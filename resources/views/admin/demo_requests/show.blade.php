@extends('layouts.backend')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Demo Request Details</h4>
    </div>

    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Full Name
            </div>

            <div class="col-md-9">
                {{ $demoRequest->full_name }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Email
            </div>

            <div class="col-md-9">
                {{ $demoRequest->email }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Company
            </div>

            <div class="col-md-9">
                {{ $demoRequest->company_name }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Industry
            </div>

            <div class="col-md-9">
                {{ $demoRequest->industry }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Primary Interest
            </div>

            <div class="col-md-9">
                {{ $demoRequest->primary_interest }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Notes
            </div>

            <div class="col-md-9">
                {!! nl2br(e($demoRequest->notes)) !!}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-bold">
                Status
            </div>

            <div class="col-md-9">
                {{ ucfirst(str_replace('_', ' ', $demoRequest->status)) }}
            </div>
        </div>

    </div>

</div>

@endsection
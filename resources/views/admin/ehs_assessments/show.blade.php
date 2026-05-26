@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Assessment Details</h4>

    <!-- Contact Info -->
    <div class="card card-modern mb-4 p-4">

        <h5 class="mb-3">Contact Information</h5>

        <div class="row">

            <div class="col-md-6">

                <p><strong>Name:</strong> {{ $item->name }}</p>

                <p><strong>Email:</strong> {{ $item->email }}</p>

                <p><strong>Phone:</strong> {{ $item->phone ?? '—' }}</p>

            </div>

            <div class="col-md-6">

                <p><strong>Company:</strong> {{ $item->company ?? '—' }}</p>

                <p><strong>Country:</strong> {{ $item->country ?? '—' }}</p>

                <p><strong>Role:</strong> {{ $item->role ?? '—' }}</p>

            </div>

        </div>

    </div>

    <!-- Scores -->
    <div class="row mb-4">

        <div class="col-md-6 mb-3">

            <div class="card card-modern p-4 h-100">

                <div class="text-muted mb-2">
                    Risk Score
                </div>

                <h1 class="text-danger fw-bold mb-0">
                    {{ $item->risk_score }}/100
                </h1>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="card card-modern p-4 h-100">

                <div class="text-muted mb-2">
                    EHS Readiness
                </div>

                <h1 class="text-success fw-bold mb-0">
                    {{ $item->ehs_readiness_score }}/100
                </h1>

            </div>

        </div>

    </div>

    <!-- AI Summary -->
    <div class="card card-modern mb-4 p-4">

        <h5 class="mb-3">
            AI Operational Insight
        </h5>

        <div style="
            line-height: 2;
            color: #444;
            white-space: pre-line;
            font-size: 15px;
        ">
            {!! nl2br(e($item->ai_summary)) !!}
        </div>

    </div>

    <!-- Assessment Answers -->
    <div class="card card-modern p-4">

        <h5 class="mb-4">
            Assessment Responses
        </h5>

        @php

            $questionLabels = [

                "1" => "Industry",
                "2" => "Organization Size",
                "3" => "Contractor Dependency",
                "4" => "Current EHS Management Method",
                "5" => "Incident Reporting Method",
                "6" => "Compliance Tracking",
                "7" => "EHS Reporting Time",
                "8" => "Biggest Operational Gap",
                "9" => "Audit Preparation Effort",
                "10" => "Platform Priorities",

            ];

        @endphp

        <div class="row">

            @foreach(($item->assessment_answers ?? []) as $key => $answer)

                <div class="col-md-6 mb-4">

                    <div style="
                        border:1px solid #E5E7EB;
                        border-radius:14px;
                        padding:18px;
                        height:100%;
                        background:#fff;
                    ">

                        <div style="
                            font-size:13px;
                            font-weight:700;
                            color:#888;
                            margin-bottom:10px;
                            text-transform:uppercase;
                            letter-spacing:1px;
                        ">

                            {{ $questionLabels[$key] ?? 'Question '.$key }}

                        </div>

                        @if(is_array($answer))

                            <div class="d-flex flex-wrap gap-2">

                                @foreach($answer as $value)

                                    <span class="badge bg-primary">
                                        {{ $value }}
                                    </span>

                                @endforeach

                            </div>

                        @else

                            <div style="
                                font-size:15px;
                                color:#222;
                                line-height:1.7;
                                font-weight:500;
                            ">
                                {{ $answer }}
                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection
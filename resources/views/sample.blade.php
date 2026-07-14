@extends('layouts.frontend')

@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'SOAPBOX.CLOUD™ | Intelligent Platform for Responsible Enterprises',
    'description' => $meta->meta_description ?? 'Manage compliance, safety, and risk workflows in one enterprise operating system. Soapbox Cloud helps regulated teams automate and stay audit-ready.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/sliderstyles.css')}}">
@endsection

@section('content')
<div class="main">
    <div class="carousel">
        <button class="nav-btn prev" aria-label="Scroll left">←</button>
        <div class="slider-container">
            @foreach ($modules as $module)

                <div class="panel {{ $loop->first ? 'active' : '' }}"
                    data-module-id="{{ $module->id }}"
                    data-module-slug="{{ $module->slug }}"
                    style="background-image: url('{{ asset($module->image) }}')">

                    <div class="content">

                        <h3>{{ $module->name }}</h3>

                        <p>
                            {{ Str::limit(strip_tags($module->short_description), 100) }}
                        </p>

                        <a href="{{ route('modules.show', $module->slug) }}"
                        class="know-more">
                            Know More
                        </a>

                    </div>

                </div>

                @endforeach
        </div>
        <button class="nav-btn next" aria-label="Scroll right">→</button>
    </div>

</div>
@endsection

@section('script')
<script src="{{asset('js/sliderscript.js')}}"></script>
@endsection
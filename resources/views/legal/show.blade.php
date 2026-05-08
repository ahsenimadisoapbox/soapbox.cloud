@extends('layouts.frontend')

@section('meta')
@include('partials.meta', [
    'title' => $page->meta_title ?? 'SOAPBOX.CLOUD™ | Intelligent Platform for Responsible Enterprises',
    'description' => $page->meta_description ?? 'Manage compliance, safety, and risk workflows in one enterprise operating system. Soapbox Cloud helps regulated teams automate and stay audit-ready.',
    'keywords' => $page->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection

@section('content')
<div class="container my-5">
    <div class="legal-content">
        {!! $page->content !!}
    </div>
</div>
@endsection
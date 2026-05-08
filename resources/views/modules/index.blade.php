@extends('layouts.frontend')
 
@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'Early Adopters Program for Soapbox Cloud | Join Now',
    'description' => $meta->meta_description ?? 'Get first access to Soapbox enterprise cloud platform for compliance, safety, quality, and governance. Join the Early Adopters Program.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
 
@section('content')
<section class="hero">
    <div class="container max-w-1000 text-center" data-aos="zoom-in">
        <div class="tag mb-2">PLATFORM MODULES</div>
        <h1 class="section-title">
            21 Modules. One Platform.
            <span class="text-blue">Every EHS Function.</span>
        </h1>
        <h3 class="section-sub mx-auto">
            Six modules live today. Fifteen more on the roadmap. All connected. All included. No add-ons.
        </h3>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <a href="{{ route('eap') }}#how-it-works" class="btn btn-custome text-white" id="scrollToDiagnostic">
                Run your self-diagnosis
                <span class="ms-2">&rarr;</span>
            </a>
        </div>
    </div>
</section>
 
<section class="py-5">
    <div class="container">
        @foreach ($categories as $category)
            @if($category->modules->count())
            <div class="mb-5">
                <h2 class="tag mb-0">{{ $category->name }}</h2>
                <hr class="mt-1">
                <div class="row">
                    @foreach ($category->modules as $module)
                        @if ($module->is_live == 1)
                            <div class="col-md-6 col-lg-4 p-2">
                                <div class="card rounded-3 shadow-sm border-0 border-start border-4 border-success module-card h-100">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <a href="{{ route('modules.show', $module->slug) }}"
                                            class="text-dark text-decoration-none">
                                                <h4 class="fs-14 fw-semibold mb-0">
                                                    {{ $module->name }}
                                                </h4>
                                            </a>
                                            <div class="mod-badge">✅ LIVE</div>
                                        </div>
                                        {{-- DESCRIPTION --}}
                                        <div class="text-muted fs-12">
                                            {!! Str::limit(strip_tags($module->description), 100) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6 col-lg-4 p-2">
                                <div class="card rounded-3 shadow-sm border-0 border-start border-4 border-secondary module-card h-100 opacity-50">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fs-14 fw-semibold mb-0">
                                                {{ $module->name }}
                                            </h4>
                                            <div class="mod-badge coming-soon">COMING SOON</div>
                                        </div>
                                        <div class="text-muted fs-12">
                                            {!! Str::limit(strip_tags($module->description), 100) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    </div>
</section>
@if ($faqs->count())
<section class="faqs py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title fw-bold">Frequently Asked Questions</h2>
      <p class="text-muted">Find answers to common questions below</p>
    </div>
    <div class="accordion faq-accordion" id="faqAccordion">
      @foreach ($faqs as $key => $faq)
        <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
          <h2 class="accordion-header" id="heading{{ $key }}">
            <button class="accordion-button collapsed fw-semibold rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
              {{ $faq->question }}
            </button>
          </h2>
          <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#faqAccordion">
            <div class="accordion-body text-muted">
              {!! $faq->answer !!}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
<section class="closer">
    <div class="container px-3  justify-content-center text-center text-white">
        <div class="closer-content max-w-1000">
            <div class="hero-badge mx-auto mb-4">Self-diagnosis tool</div>
            <p class="closer-quote">Before we show you the product, let's understand your operation</p>
            <a href="{{ route('eap') }}#diagnostic" class="btn btn-first" onclick="showPage('eap')">Start self-diagnosis →</a>
        </div>
    </div>
</section>
@endsection
 
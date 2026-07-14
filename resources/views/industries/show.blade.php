@extends('layouts.frontend')

@section('content')

{{-- ===================================================== --}}
{{-- HERO --}}
{{-- ===================================================== --}}

<section class="hero industry-hero py-5" style="background: url('{{ asset($industry->banner_image) }}');">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <span class="hero-livebadge mx-auto mb-1">
                    EHS SYSTEM IN {{ strtoupper($industry->title) }} INDUSTRY
                </span>

                <h1 class="hero-title text-white mt-4">
                    {{ $industry->headline }}
                </h1>

                <div class="section-sub text-white my-0 mx-auto fs-16 fw-normal">
                    {!! $industry->description !!}
                </div>

                <div class="d-flex gap-3 mt-4 flex-wrap">

                    <a href="{{ route('eap') }}"
                       class="btn-custome">
                        Run the 30-Second EHS Check
                    </a>

                    <a href="#related-modules"
                       class="btn-custome1">
                        Explore Solutions
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ===================================================== --}}
{{-- MOVING RIBBON --}}
{{-- ===================================================== --}}

<section class="industry-internal-ribbon">

    <div class="industry-internal-ribbon-marquee">

        <div class="industry-internal-ribbon-track">

            {{-- First Loop --}}
            @foreach($modules as $module)

                @if($module->is_live)

                    <a href="{{ route('modules.show', $module->slug) }}"
                       class="industry-ribbon-module live-module">

                        {{ $module->name }}

                        <small class="industry-ribbon-badge live">
                            LIVE
                        </small>

                    </a>

                @else

                    <span class="industry-ribbon-module">

                        {{ $module->name }}

                        <small class="industry-ribbon-badge upcoming">
                            SOON
                        </small>

                    </span>

                @endif

                <span>•</span>

            @endforeach


            {{-- Duplicate for seamless marquee --}}
            @foreach($modules as $module)

                @if($module->is_live)

                    <a href="{{ route('modules.show', $module->slug) }}"
                       class="industry-ribbon-module live-module">

                        {{ $module->name }}

                        <small class="industry-ribbon-badge live">
                            LIVE
                        </small>

                    </a>

                @else

                    <span class="industry-ribbon-module">

                        {{ $module->name }}

                        <small class="industry-ribbon-badge upcoming">
                            SOON
                        </small>

                    </span>

                @endif

                <span>•</span>

            @endforeach

        </div>

    </div>

</section>

{{-- ===================================================== --}}
{{-- REALITY SECTION --}}
{{-- ===================================================== --}}
<section class="industry-internal-section">

    <div class="container max-w-1400">

        <div class="text-center mb-5">

            <div class="industry-internal-tag mb-3">
                OPERATIONS WE SUPPORT
            </div>

            <h2 class="section-title">
                Built For Real-World Operations
            </h2>

        </div>

        <div class="industry-operations-slider-wrapper">

            <button class="industry-operations-nav-btn prev">←</button>

            <div class="industry-operations-slider-mask">

                <div class="industry-operations-slider-container">

                    @foreach($industry->operations as $operation)

                        <div class="industry-operation-panel {{ $loop->first ? 'active' : '' }}">

                            <div class="industry-operation-panel-inner industry-color-{{ ($loop->index % 5) + 1 }}">

                                <div class="industry-operation-number">
                                    {{ str_pad($loop->iteration,2,'0',STR_PAD_LEFT) }}
                                </div>

                                <div class="industry-operation-panel-content">

                                    <h3>{{ $operation->name }}</h3>

                                    <div class="industry-operation-desc">
                                        <p>{{ $operation->description }}</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <button class="industry-operations-nav-btn next">→</button>

        </div>

    </div>

</section>



{{-- ===================================================== --}}
{{-- LEGACY SYSTEM INTRO --}}
{{-- ===================================================== --}}
<section class="py-5 bg-gradient-customeblue">

    <div class="container max-w-1400">

        <div class="industry-internal-tag text-white mb-3">
            OPERATIONAL CHALLENGE
        </div>

        <h2 class="section-title text-white mb-5">
            Most {{ $industry->title }} EHS Programmes Didn't Start With A Platform
        </h2>

        {{-- ROW 1 --}}
        <div class="row g-4 align-items-stretch">

            {{-- LEFT : LEGACY INTRO --}}
            <div class="col-lg-7">

                <div class="industry-internal-legacy-box h-100">

                    <div class="industry-internal-content">
                        {!! $industry->legacy_system_intro !!}
                    </div>

                </div>

            </div>

            {{-- RIGHT : IMAGE + DID YOU KNOW --}}
            <div class="col-lg-5">

                <div class="industry-internal-side-stack">

                    {{-- IMAGE --}}
                    <div class="industry-internal-side-image">

                        @if($industry->image)
                            <img src="{{ asset($industry->image) }}" alt="{{ $industry->title }}">
                        @else
                            <img src="{{ asset('images/default-industry.jpg') }}" alt="">
                        @endif

                    </div>

                    {{-- DID YOU KNOW --}}
                    <div class="industry-internal-insight-card industry-internal-insight-blue">

                        <div class="industry-internal-insight-icon">💡</div>

                        <div class="industry-internal-insight-label text-white">
                            DID YOU KNOW?
                        </div>

                        <div class="industry-internal-insight-content text-white">
                            {!! $industry->did_you_know !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- ROW 2 : KEY TAKEAWAY --}}
        <div class="row mt-5 justify-content-center">

            <div class="col-lg-8">

                <div class="industry-internal-insight-card industry-internal-insight-green">

                    <div class="industry-internal-insight-icon text-white">✓</div>

                    <div class="industry-internal-insight-label">
                        KEY TAKEAWAY
                    </div>

                    <div class="industry-internal-insight-content">
                        {!! $industry->key_takeaways !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ===================================================== --}}
{{-- SCALING SILO TRAP --}}
{{-- ===================================================== --}}
<!-- <section class="industry-internal-section">

    <div class="container max-w-1400 text-center">

        <div class="industry-internal-tag mb-3">
            THE SCALING SILO TRAP
        </div>

        <h2 class="industry-internal-heading">
            Information Grows. Visibility Shrinks.
        </h2>

        <p class="industry-internal-silo-subtitle">
            More projects. More contractors. More reporting. More systems. Less visibility.
        </p>

        <div class="industry-silo-flow-wrapper">

            <svg class="industry-silo-svg"></svg>

            <div class="industry-silo-flow">

                @foreach($industry->scaling_silo_trap ?? [] as $item)

                    <div class="industry-silo-node-wrapper">

                        <div class="industry-silo-node {{ $loop->last ? 'industry-silo-final' : '' }}">

                            <div class="industry-silo-icon">

                                @switch($item['type'] ?? '')

                                    @case('excel')
                                        <i class="fa-solid fa-file-excel"></i>
                                        @break

                                    @case('email')
                                        <i class="fa-solid fa-envelope"></i>
                                        @break

                                    @case('folder')
                                        <i class="fa-solid fa-folder"></i>
                                        @break

                                    @case('whatsapp')
                                        <i class="fa-brands fa-whatsapp"></i>
                                        @break

                                    @case('database')
                                        <i class="fa-solid fa-database"></i>
                                        @break

                                    @case('visibility')
                                        <i class="fa-solid fa-eye-slash"></i>
                                        @break

                                    @default
                                        <i class="fa-solid fa-file"></i>

                                @endswitch

                            </div>

                            <span>
                                {{ $item['title'] ?? '' }}
                            </span>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section> -->
{{-- ===================================================== --}}
{{-- AI STRIP --}}
{{-- ===================================================== --}}

<section class="industry-internal-ai-strip">

    <div class="industry-internal-ai-marquee">

        <div class="industry-internal-ai-track">

            <span>🤖 Improve Records & Detect Missing Info</span>
            <span>•</span>
            <span>Draft Stronger Actions</span>
            <span>•</span>
            <span>Strengthen Audit Readiness</span>
            <span>•</span>
            <span>Surface Live Management Insights</span>
            <span>•</span>

            <!-- duplicate for seamless loop -->

            <span>🤖 Improve Records & Detect Missing Info</span>
            <span>•</span>
            <span>Draft Stronger Actions</span>
            <span>•</span>
            <span>Strengthen Audit Readiness</span>
            <span>•</span>
            <span>Surface Live Management Insights</span>
            <span>•</span>

        </div>

    </div>

</section>


{{-- ===================================================== --}}
{{-- RELATED MODULES --}}
{{-- ===================================================== --}}
<section id="related-modules" class="industry-internal-section-alt py-5">

    <div class="container max-w-1400">

        <div class="text-center mb-5">

            <div class="industry-internal-tag mb-3">
                RELATED SYSTEM MODULES
            </div>

            <h2 class="industry-internal-heading">
                Connected Solutions For {{ $industry->title }}
            </h2>

        </div>

        <div class="industry-internal-modules-slider-wrapper">

            <button class="industry-internal-nav-btn prev">←</button>
            <div class="industry-internal-slider-mask">

            <div class="industry-internal-slider-container">

                @foreach($recommendedModules as $module)

                    <div class="industry-internal-panel {{ $loop->first ? 'active' : '' }}"
                         data-module-id="{{ $module->id }}"
                         data-module-slug="{{ $module->slug }}"
                         style="background-image:url('{{ asset($module->image) }}')">

                        <div class="industry-internal-panel-overlay"></div>

                        <div class="industry-internal-panel-content">

                            <h3>{{ $module->name }}</h3>

                            <p>
                                {{ Str::limit(strip_tags($module->short_description), 120) }}
                            </p>

                            <a href="{{ route('modules.show', $module->slug) }}">
                                Learn More →
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>
            </div>

            <button class="industry-internal-nav-btn next">→</button>

        </div>

    </div>

</section>
{{-- =========================================
    FAQ SECTION
========================================= --}}
@if ($faqs->count())
<section class="bg-white py-5">
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
    <div class="closer-content max-w-1200">
        <h2>
        {{ $industry->cta_title }}
        </h2>
        <div class="fs-18 text-visible fw-normal mb-4 fst-italic">
        {!! $industry->cta_description !!}
        </div>
      <a href="{{ route('eap') }}" class="btn btn-first" onclick="showPage('eap')">Take the 30-sec EHS Check →</a>
    </div>
  </div>
</section>



@endsection

@section('script')

<script src="{{ asset('js/industry-internal.js') }}"></script>

@endsection
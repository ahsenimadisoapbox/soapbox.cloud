@extends('layouts.frontend')

@section('content')

{{-- =========================================
    HERO SECTION
========================================= --}}

<section class="industry-hero py-100">

    <div class="container max-w-1400">

        <div class="row align-items-center g-5">

            {{-- LEFT CONTENT --}}

            <div class="col-md-7">

                <div class="tag">
                    INDUSTRY SOLUTIONS
                </div>

                <h1 class="industry-title">
                    {{ $industry->title }}
                </h1>

                <p class="industry-subtitle">
                    {{ $industry->subtitle }}
                </p>

                <div class="industry-description">

                    {!! $industry->description !!}

                </div>

                <div class="mt-4">

                    <a href="/contact"
                       class="btn-custome">

                        Request Demo

                    </a>

                </div>

            </div>

            {{-- RIGHT IMAGE --}}

            <div class="col-md-5">

                <div class="industry-hero-image">

                    <img src="{{ asset($industry->image) }}"
                         class="img-fluid">

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================
    SECTION INTRO
========================================= --}}

<section class="industry-intro py-100">

    <div class="container max-w-1200 text-center">

        <div class="tag">
            WHY IT MATTERS
        </div>

        <h2 class="common-title">

            {{ $industry->section_title }}

        </h2>

        <p class="common-text mx-auto">

            {{ $industry->section_description }}

        </p>

    </div>

</section>


{{-- =========================================
    SERVICES SECTION
========================================= --}}

<section class="industry-services pb-100">

    <div class="container max-w-1400">

        @foreach($industry->services as $service)

            <div class="service-block py-5">

                <div class="row align-items-center g-5">

                    {{-- IMAGE LEFT --}}

                    @if($loop->odd)

                        <div class="col-md-6">

                            <div class="service-image-wrapper">

                                <img src="{{ asset($service->image) }}"
                                     class="img-fluid">

                            </div>

                        </div>

                    @endif


                    {{-- CONTENT --}}

                    <div class="col-md-6">

                        <div class="service-content">

                            <div class="service-label">

                                SERVICE SOLUTION

                            </div>

                            <h2 class="service-title">

                                {{ $service->title }}

                            </h2>

                            <div class="service-description">

                                {!! $service->description !!}

                            </div>
<!-- 
                            <div class="mt-4">

                                <a href="/services/{{ $service->slug }}"
                                   class="btn-outline-third px-4 py-2 rounded-pill text-decoration-none">

                                    Explore Solution

                                </a>

                            </div> -->

                        </div>

                    </div>


                    {{-- IMAGE RIGHT --}}

                    @if($loop->even)

                        <div class="col-md-6">

                            <div class="service-image-wrapper">

                                <img src="{{ asset($service->image) }}"
                                     class="img-fluid">

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        @endforeach

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

@endsection
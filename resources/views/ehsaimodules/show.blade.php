@extends('layouts.frontend')

@section('content')

{{-- HERO --}}
<section class="hero ai-modules-hero py-5">


    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <span class="hero-livebadge mx-auto mb-1">
                    EHS AI ASSIST
                </span>

                <h1 class="hero-title text-white mt-4">

                    {{ $module-> hero_title}}

                </h1>

                <div class="hero-copy text-white mt-4">

                    {{ $module-> hero_headline}}

                </div>
                <div class="d-flex flex-column flex-sm-row  gap-3 mt-4">
                    <a href="{{ route('eap') }}#diagnostic" class="btn btn-custome text-white" >
                        Take the 30-sec EHS Check
                        <span class="ms-2">&rarr;</span>
                    </a>
                    <!-- <a href="{{ route('eap') }}#diagnostic" class="btn btn-custome text-white" >
                        See AI Use Cases
                        <span class="ms-2">&rarr;</span>
                    </a> -->

                </div>

            </div>

        </div>

    </div>

</section>

<section class="ai-why-section py-5">
    <div class="container">
        <div class="ai-why-wrapper">
            <div class="row align-items-center g-5">
                <div class="col-md-12">

                    <div class="ai-why-content">
                        <span class="ai-why-tag">
                            WHY AI ASSIST
                        </span>

                        <h2 class="ai-why-title">
                            Why {{ $module->name }} Needs AI Assist
                        </h2>

                        <div class="ai-why-text collapsed" id="aiWhyText">
                            {!! $module->why_ai_assist !!}
                        </div>

                        <button class="ai-why-btn mt-4" id="aiWhyToggle">
                            Learn More ↓
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- HELP ITEMS --}}
<section class="ai-help-section py-5">

    <div class="container">

        <div class="text-center section-title mb-5">

            <h2>
                What EHS AI Assist Helps With
            </h2>

        </div>

        <div class="row g-4">

            @foreach($module->helpItems as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="help-card ai-module-help-card">
                        <div class="d-flex align-items-center">
                            <div class="ai-module-help-icon  me-3">
                                <i class="{{ $item->icon ?? 'bi bi-stars' }}"></i>
                            </div>
    
                            <h4 class="fs-18 justify-content-center ">
                                {{ $item->name }}
                            </h4>

                        </div>


                        <p class="fs-14">
                            {{ $item->description }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

{{-- HUMAN IN LOOP --}}
<section class="ai-module-human-loop py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="ai-module-section-tag">
                    HUMAN-IN-THE-LOOP ASSURANCE
                </span>

                <h2 class="ai-module-section-title mt-3 text-white">
                    Humans Review Every AI Recommendation
                </h2>

                <div class="ai-module-human-copy mt-4">
                    {!! $module->human_loop_description !!}
                </div>

            </div>

            <div class="col-lg-6">

                <div class="ai-module-review-flow">

                    <div class="ai-module-flow-card">
                        <i class="bi bi-stars"></i>
                        <span>AI Suggestion</span>
                    </div>

                    <div class="ai-module-flow-line"></div>

                    <div class="ai-module-flow-card ai-module-flow-highlight">
                        <i class="bi bi-person-check"></i>
                        <span>Human Review</span>
                    </div>

                    <div class="ai-module-flow-line"></div>

                    <div class="ai-module-flow-card">
                        <i class="bi bi-check-circle"></i>
                        <span>Approved Record</span>
                    </div>

                </div>

                <div class="ai-module-trust-box mt-4">

                    <h5>Trust & Governance</h5>

                    <div class="row g-3 mt-2">

                        @foreach($module->trustPoints as $point)

                            <div class="col-md-6">

                                <div class="ai-module-trust-item">

                                    <i class="bi bi-shield-check"></i>

                                    <span>
                                        {{ $point->name }}
                                    </span>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- BUSINESS OUTCOMES --}}
<section class="ai-module-outcomes py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="ai-module-section-tag">
                BUSINESS OUTCOMES
            </span>

            <h2 class="ai-module-section-title mt-3">
                Better Decisions. Better Outcomes.
            </h2>

        </div>

        <div class="row g-4">

            @foreach($module->businessOutcomes as $outcome)

                <div class="col-md-6 col-lg-4">

                    <div class="ai-module-outcome-card">
                        <div class="d-flex align-items-center">

                            <div class="ai-module-outcome-icon me-3 ">
                                <i class="{{ $outcome->icon ?? 'bi bi-graph-up-arrow' }}"></i>
                            </div>
    
                            <h4 class="fs-18">
                                {{ $outcome->name }}
                            </h4>
                        </div>


                        <p class="fs-14">
                            {{ $outcome->description }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<section class="closer">
  <div class="container px-3  justify-content-center text-center text-white">
    <div class="closer-content max-w-1200">
        <h2>

                {{ $module->cta_title }}

            </h2>
      <p class="closer-quote fw-normal fs-18">
        {{ $module->cta_description }}
      </p>
      <a href="{{ route('eap') }}" class="btn btn-first" onclick="showPage('eap')">Take the 30-sec EHS Check →</a>
    </div>
  </div>
</section>

@endsection


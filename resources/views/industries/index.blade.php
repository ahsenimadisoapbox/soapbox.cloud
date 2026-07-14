@extends('layouts.frontend')

@section('content')

<!-- HERO -->


<section class="hero industries-hero">

    <div class="container " data-aos="zoom-in">

        <div class="row ">

            <div class="col-lg-9 col-xl-8">

                <div class="hero-livebadge mx-auto mb-4">
                    EHS SOFTWARE BY INDUSTRY
                </div>

                <h1 class="hero-title text-white">
                    Every industry has risk.
                    <br>
                    Not every industry
                    <br>
                    can <span class="text-green">see</span> it.
                </h1>

                <p class="section-sub text-white">
                    AI-powered EHS management across 12 industries
                    and 8 regulatory frameworks. From incident
                    reporting to compliance — one platform.
                </p>
                
                <!-- <div class="industry-tags-wrapper">

                    <div class="industry-tags-slider">

                        <div class="industry-tags-track">

                            <span>Oil & Gas</span>
                            <span>Mining</span>
                            <span>Construction</span>
                            <span>Manufacturing</span>
                            <span>Chemical</span>
                            <span>Power</span>
                            <span>Pharma</span>
                            <span>Food & Bev</span>
                            <span>Transport</span>
                            <span>Utilities</span>
                            <span>Education</span>
                            <span>Healthcare</span>

                            <span>Oil & Gas</span>
                            <span>Mining</span>
                            <span>Construction</span>
                            <span>Manufacturing</span>
                            <span>Chemical</span>
                            <span>Power</span>
                            <span>Pharma</span>
                            <span>Food & Bev</span>
                            <span>Transport</span>
                            <span>Utilities</span>
                            <span>Education</span>
                            <span>Healthcare</span>

                        </div>

                    </div>
                </div> -->
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="{{ route('eap') }}#diagnostic" class="btn btn-custome text-white" >
                        Take the 30-sec EHS Check-diagnosis
                        <span class="ms-2">&rarr;</span>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="industry-internal-ai-strip">

    <div class="industry-internal-ai-marquee">

        <div class="industry-internal-ai-track">

            <span>Oil & Gas</span>
            <span>•</span>
            <span>Mining</span>
            <span>•</span>
            <span>Construction</span>
            <span>•</span>
            <span>Manufacturing</span>
            <span>•</span>
            <span>Chemical</span>
            <span>•</span>
            <span>Power</span>
            <span>•</span>
            <span>Pharma</span>
            <span>•</span>
            <span>Food & Bev</span>
            <span>•</span>
            <span>Transport</span>
            <span>•</span>
            <span>Utilities</span>
            <span>•</span>
            <span>Education</span>
            <span>•</span>
            <span>Healthcare</span>
            <span>•</span>

            <!-- duplicate for seamless loop -->

            <span>Oil & Gas</span>
            <span>•</span>
            <span>Mining</span>
            <span>•</span>
            <span>Construction</span>
            <span>•</span>
            <span>Manufacturing</span>
            <span>•</span>
            <span>Chemical</span>
            <span>•</span>
            <span>Power</span>
            <span>•</span>
            <span>Pharma</span>
            <span>•</span>
            <span>Food & Bev</span>
            <span>•</span>
            <span>Transport</span>
            <span>•</span>
            <span>Utilities</span>
            <span>•</span>
            <span>Education</span>
            <span>•</span>
            <span>Healthcare</span>
            <span>•</span>

        </div>

    </div>

</section>

<!-- =========================================
     AI INCIDENT SECTION
========================================= -->



<!-- INDUSTRIES GRID -->

<!-- 
@php
    $middleIndex = ceil($industries->count() / 2);
@endphp -->

@foreach($industries as $industry)
<section class="industry-showcase-section {{ $loop->even ? 'bg-white' : '' }}">
        <div class="container">

<div class="industry-showcase-card">

    <div class="row align-items-center g-5 py-3">

        @if($loop->odd)

            <!-- IMAGE LEFT -->

            <div class="col-lg-4" data-aos="fade-up">

                <div class="industry-showcase-image">

                    <img src="{{ asset($industry->image) }}"
                         alt="{{ $industry->title }}">

                </div>

            </div>

            <!-- CONTENT RIGHT -->

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

                <div class="industry-showcase-content">

                    <span class="industry-showcase-label">
                        INDUSTRY {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <h2 class="industry-showcase-title">
                        {{ $industry->title }}
                    </h2>

                    <!-- <div class="industry-risk-box">

                        <strong>
                            Critical Industry Risk:
                        </strong>

                        {{ $industry->critical_risk }}

                    </div> -->

                    <p class="industry-showcase-desc">

                        {!! Str::limit(strip_tags($industry->description), 240) !!}

                    </p>

                    <div class="industry-showcase-tags">

                        @if($industry->recommendedModules->count())

                            <div class="industry-module-tags">

                                @foreach($industry->recommendedModules as $tag)

                                    <span class="module-tag">
                                        {{ $tag->name }}
                                    </span>

                                @endforeach

                            </div>

                        @endif

                        @if($industry->regulations->count())

                            <div class="industry-regulation-tags mt-3">

                                @foreach($industry->regulations as $regulation)

                                    <span class="regulation-tag">
                                        {{ $regulation->name }}
                                    </span>

                                @endforeach

                            </div>

                        @endif

                        

                    </div>

                    <a href="{{ url('/industries/' . $industry->slug) }}"
                       class="btn industry-showcase-btn mt-3 text-white btn-sm px-3 px-lg-4 fw-semibold">

                        Explore Industry

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </div>

        @else

            <!-- CONTENT LEFT -->

            <div class="col-lg-8 order-2 order-lg-1 bg-white" data-aos="fade-down">

                <div class="industry-showcase-content">

                    <span class="industry-showcase-label">
                        INDUSTRY {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <h2 class="industry-showcase-title">
                        {{ $industry->title }}
                    </h2>

                    <!-- <div class="industry-risk-box">

                        <strong>
                            Critical Industry Risk:
                        </strong>

                        {{ $industry->critical_risk }}

                    </div> -->

                    <p class="industry-showcase-desc">

                        {!! Str::limit(strip_tags($industry->description), 240) !!}

                    </p>

                    <div class="industry-showcase-tags">

                        @if(!empty($industry->recommendedModules->count()))

                            <div class="industry-module-tags">

                                @foreach($industry->recommendedModules as $tag)

                                    <span class="module-tag">
                                        {{ $tag->name }}
                                    </span>

                                @endforeach

                            </div>

                        @endif

                        @if($industry->regulations->count())

                            <div class="industry-regulation-tags mt-3">

                                @foreach($industry->regulations as $regulation)

                                    <span class="regulation-tag">
                                        {{ $regulation->name }}
                                    </span>

                                @endforeach

                            </div>

                        @endif

                    </div>

                    <a href="{{ url('/industries/' . $industry->slug) }}"
                       class="btn industry-showcase-btn mt-3 text-white btn-sm px-3 px-lg-4 fw-semibold">

                        Explore Industry

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </div>

            <!-- IMAGE RIGHT -->

            <div class="col-lg-4 order-1 order-lg-2" data-aos="fade-down" data-aos-delay="100">

                <div class="industry-showcase-image">

                    <img src="{{ asset($industry->image) }}"
                         alt="{{ $industry->title }}">

                </div>

            </div>

        @endif

    </div>

</div>

<!-- @if($loop->iteration == $middleIndex) -->

<!-- 

@endif -->


    </div>

</section>

@endforeach

<section>
    
    <div class="container max-w-800" data-aos="fade-up">

        <div class="industry-mid-cta">

            <div class="row align-items-center g-5">

                <!-- Left Content -->

                <div class="col-md-8">

                    <div class="industry-mid-cta-inner text-md-start text-center">

                        <h2>
                            Take the 30-Second EHS Check
                        </h2>

                        <p>
                            10 questions. Your risk score in 2 minutes.
                        </p>

                        <div class="industry-mid-icons justify-content-md-start justify-content-center">

                            <div>
                                <span class="icons">🛡️</span>
                                <span>Safer Workplaces</span>
                            </div>

                            <div>
                                <span class="icons">⏱️</span>
                                <span>30 Seconds</span>
                            </div>

                            <div>
                                <span class="icons">📈</span>
                                <span>Better Outcomes</span>
                            </div>

                        </div>

                        <a href="{{ route('eap') }}#diagnostic"
                           class="industry-mid-btn">

                            Take the 30-sec EHS Check Diagnosis →

                        </a>

                        <small>
                            Built by 20+ years of team experience in regulated industries
                        </small>

                    </div>

                </div>

                <!-- Right Image -->

                <div class="col-md-4 d-flex align-items-center justify-content-center">

                    <div class="industry-mid-image-wrapper d-flex justify-content-center align-items-center w-100">

                        <img src="{{ asset('images/risk-assessment.png') }}"
                             alt="30 Second EHS Check"
                             class="industry-mid-image">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
     GLOBAL COMPLIANCE SECTION
========================================= -->

<section class="global-compliance-section">

    <div class="container">

        <div class="compliance-heading">

            <span class="compliance-label">
                GLOBAL COMPLIANCE
            </span>

            <h2>
                One platform. Every regulatory framework.
            </h2>

            <p>
                Obligation tracking, evidence mapping, and deadline management across 8 jurisdictions.
            </p>

        </div>

        <div class="row g-4 compliance-grid">

            <!-- UNITED STATES -->
            <div class="col-md-4">

                <div class="compliance-framework-card framework-us" data-aos="fade-up" >

                    <div class="framework-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <span class="framework-region">
                        NORTH AMERICA
                    </span>

                    <h5>
                        OSHA & Process Safety
                    </h5>

                    <p>
                        OSHA 1910 · 1926 · PSM · EPA · MSHA
                    </p>

                </div>

            </div>

            <!-- UNITED KINGDOM -->
            <div class="col-md-4">

                <div class="compliance-framework-card framework-uk" data-aos="fade-up" data-aos-delay="100">

                    <div class="framework-icon">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>

                    <span class="framework-region">
                        UNITED KINGDOM & IRELAND
                    </span>

                    <h5>
                        HSE & COMAH Compliance
                    </h5>

                    <p>
                        HSE · COSHH · CDM · COMAH · RIDDOR
                    </p>

                </div>

            </div>

            <!-- UAE -->
            <div class="col-md-4">

                <div class="compliance-framework-card framework-uae" data-aos="fade-up" data-aos-delay="200">

                    <div class="framework-icon">
                        <i class="bi bi-building-check"></i>
                    </div>

                    <span class="framework-region">
                        MIDDLE EAST
                    </span>

                    <h5>
                        Industrial & Workforce Safety
                    </h5>

                    <p>
                        OSHAD · DEWA · GOSI · Saudi OSHA
                    </p>

                </div>

            </div>

            <!-- SAUDI -->
            <div class="col-md-4">

                <div class="compliance-framework-card framework-sa" data-aos="fade-up" data-aos-delay="300">

                    <div class="framework-icon">
                        <i class="bi bi-file-earmark-medical"></i>
                    </div>

                    <span class="framework-region">
                        ASIA PACIFIC
                    </span>

                    <h5>
                        Factory & Workplace Safety
                    </h5>

                    <p>
                        Factories Act · WHS · DOSH · PESO
                    </p>

                </div>

            </div>

            <!-- INDIA -->
            <div class="col-md-4">

                <div class="compliance-framework-card framework-in" data-aos="fade-up" data-aos-delay="400">

                    <div class="framework-icon">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>

                    <span class="framework-region">
                        AFRICA & LATIN AMERICA
                    </span>

                    <h5>
                        Occupational Health & Safety
                    </h5>

                    <p>
                        ISO 45001 · NR Norms · DMRE · local OSH
                    </p>

                </div>

            </div>

            <!-- AUSTRALIA -->
            <!-- <div class="col-md-4">

                <div class="compliance-framework-card framework-au" data-aos="fade-up" data-aos-delay="500">

                    <div class="framework-icon">
                        <i class="bi bi-shield-plus"></i>
                    </div>

                    <span class="framework-region">
                        AUSTRALIA
                    </span>

                    <h5>
                        WHS Governance
                    </h5>

                    <p>
                        SafeWork · WHS Act · TGA · State WHS Regs
                    </p>

                </div>

            </div> -->

            <!-- EU -->
            <div class="col-md-4">

                <div class="compliance-framework-card framework-eu" data-aos="fade-up" data-aos-delay="600">

                    <div class="framework-icon">
                        <i class="bi bi-globe-europe-africa"></i>
                    </div>

                    <span class="framework-region">
                        EUROPEAN UNION
                    </span>

                    <h5>
                        Seveso & REACH Frameworks
                    </h5>

                    <p>
                        EU-OSHA · Seveso III · REACH · CLP
                    </p>

                </div>

            </div>

            <!-- MALAYSIA -->
            <!-- <div class="col-md-4">

                <div class="compliance-framework-card framework-my" data-aos="fade-up" data-aos-delay="700">

                    <div class="framework-icon">
                        <i class="bi bi-diagram-3"></i>
                    </div>

                    <span class="framework-region">
                        MALAYSIA
                    </span>

                    <h5>
                        Workplace Compliance
                    </h5>

                    <p>
                        DOSH · OSHA 1994 · FMA 1967 · EQA 1974
                    </p>

                </div>

            </div> -->

        </div>
    </div>

</section>


<!-- CTA -->
 <section class="closer">
        <div class="compliance-bottom-cta">
            <h3>
                Your industry has risks.<br>
                Let’s find the ones you can’t see yet.
            </h3>

            <p>
                10 questions. Real incidents behind every answer. Your risk score in 2 minutes.
            </p>

            <a href="{{route('eap')}}#diagnostic"
               class="btn btn-first">

                Take the 30-sec EHS Check-Diagnosis →

            </a>
            <small>
                Early Adopters Programme — limited to the first cohort.
            </small>
        </div>
</section> 

@endsection
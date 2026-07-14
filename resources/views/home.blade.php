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

<section class="hero home-hero min-h-500">
  <div class="container">
 
    <div class="hero-content" data-aos="fade-up" >
      <div class="row">
        <div class="col-lg-9 col-xl-5">
          <p class="hero-tagline">Intelligent Platform for <span class="hero-tagline">Responsible Enterprises</span></p>
          <h1 class="text-white fs-42 fw-800 text-uppercase">
            Your safety data isn't missing. <br><span class="text-first fw-bold fs-38">It's disconnected.</span>
          </h1>
          <!-- <div class="hero-stat mt-4" id="heroStat" data-aos="zoom-in">2,930,000</div> -->
          <p class="text-white nav-badge p-2 mb-4">
            One EHS platform. All modules across <br> safety, risk, compliance, audit and environment.
            <!-- <span class="hero-source px-1">
              <i class="fa-solid fa-minus"></i> ILO, 2023
            </span> -->
          </p>
          <p class="text-white mb-4">
           <span class="fw-semibold home-text-gradient-blue">SOAPBOX.CLOUD™ </span> connects every safety workflow in one system, with AI Assist inside each one.
          Real-time visibility for operations that take safety seriously, without the enterprise weight.

          </p>
          <!-- <h3 class="text-first fw-semibold fs-5 my-4">No spreadsheet was ever designed to prevent this.</h3> -->
           <div class="d-flex flex-column flex-sm-row gap-3">
             <a class="btn btn-custome text-white me-2" href="{{ route('home') }}#modules">See What's Live</a>
             <a href="{{ route('eap') }}#diagnostic" class="btn-custome1" onclick="showPage('eap')">Get Early Access →</a>

           </div>
        </div>
        <div class="col-md-6 overflow-visible mt-3">
          <!-- <div class="hero-img-wrapper">
            <img src="{{ asset('images/dashboard-hero.webp') }}" alt="Dashboard Hero" class="hero-img" loading="lazy" />
          </div> -->
        </div>
      </div>
 
    </div>
  </div>
  
</section>
 
<section class="section-statistics pb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 col-lg-3 mb-3 first">
        <div class="stat-card">
          <div class="stat-num text-fifth">$176.5B</div>
          <div class="stat-label">Cost of workplace injuries in the US, 2023.
          </div>
          <div class="stat-src">NSC Injury Facts 2023</div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 mb-3 second">
        <div class="stat-card  text-nine">
          <div class="stat-num" >103M</div>
          <div class="stat-label">Production days lost to workplace injuries, 2023.</div>
          <div class="stat-src">NSC Injury Facts 2023</div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 mb-3 third">
        <div class="stat-card">
          <div class="stat-num text-first">$2–$6
          </div>
          <div class="stat-label">Return for every $1 invested in safety systems.
          </div>
          <div class="stat-src">ASSP 2019 + Verdantix 2018</div>
        </div>
      </div>
    </div>
    <p class="stat-subline mb-0">Most operations already know the problem. They just never found software built for them.</p>
  </div>
</section>
<section class="section-pad py-5 bg-light-blue">
  <div class="container">
    <div class="row">
      <div class="col-md-6 pb-3 pt-1 overflow-visible" data-aos="fade-up">
        <div class="card border-0 rounded-4 shadow border-start border-primary border-4">
          <div class="card-body p-4">
            <div class="text-third fw-semibold tag">FOUNDER</div>
            <p class="founder-msg">"I spent over three decades in regulated financial services watching compliance, audit, risk, and incident management live in separate systems. When something went wrong, nobody had the full picture. We built SOAPBOX.CLOUD™ to change that. One platform. Every obligation. Always connected."</p>
            <div class="d-flex align-items-center gap-2">
              <p class="founder-tag">
                Mohammed Moizuddin, Founder & CEO
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="text-first tag">THE PLATFORM</div>
        <p class="platform">All modules. Safety, environment, quality, risk, compliance — unified in one platform. Built for operations that take safety seriously, move fast, and demand real-time visibility from day one.</p>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="founder-box" data-aos="zoom-in" data-aos-delay="100">All modules</div>
          </div>
          <div class="col-md-6">
            <div class="founder-box" data-aos="zoom-in" data-aos-delay="200">1 platform</div>
          </div>
        </div>
      </div>
    </div>
    <p class="tag-line text-center mt-4 mb-0">Intelligent Platform for <span class="text-first">Responsible Enterprises</span></p>
  </div>
</section>
<section class="section-pad px-3 py-5 d-none d-lg-block" id="homepage-popup-trigger">
  <div class="container max-w-1000" data-aos="fade-up">
    <!-- <div class="tag">RECOGNITION OVER PERSUASION</div> -->
    <h2 class="section-title">Common EHS Management Challenges</h2>
    <h3 class="section-sub">5 Gaps Nobody Talks About</h3>
    <div class="challenge-header">
            <div class="header-left">
                <span></span>
                <label>THE GAP</label>
            </div>

            <div class="header-right">
                <label>SOAPBOX.CLOUD™</label>
                <span></span>
            </div>
    </div>
    <div class="row mb-2">
      <div class="timeline-row">

        <div class="num-box">01</div>

        <div class="gap-card">
          <h4>Incident happens.</h4>
          <p>3 days later it is logged. Context is lost.</p>
        </div>

        <div class="gap-icon">
          <i class="bi bi-bell-fill"></i>
        </div>

        <div class="center-arrow">››</div>

        <div class="solution-wrap">
          <div class="solution-icon"><i class="bi bi-phone-fill"></i></div>

          <div class="solution-card-home">
            <h4>30-second mobile capture.</h4>
            <p>Photo. Geo-tag. Every stakeholder notified instantly.</p>
          </div>
        </div>

      </div>
    </div>

    <div class="row mb-2">
      <div class="timeline-row">

        <div class="num-box">02</div>

        <div class="gap-card">
          <h4>Corrective action assigned. </h4>
          <p>Written in a notebook. Never followed up.</p>
        </div>

        <div class="gap-icon">
          <i class="bi bi-bell-fill"></i>
        </div>

        <div class="center-arrow">››</div>

        <div class="solution-wrap">
          <div class="solution-icon"><i class="bi bi-phone-fill"></i></div>

          <div class="solution-card-home">
            <h4>Auto-created. Named owner.</h4>
            <p> Deadline tracked. Closure verified with evidence.</p>
          </div>
        </div>

      </div>
    </div>

    <div class="row mb-2">
      <div class="timeline-row">

        <div class="num-box">03</div>

          <div class="gap-card">
              <h4>Regulator gives 48 hours notice.</h4>
               <p>EHS Manager spends the night pulling files.</p>
          </div>

          <div class="gap-icon">
              <i class="bi bi-bell-fill"></i>
          </div>

          <div class="center-arrow">››</div>

            <div class="solution-wrap g-2">
              <div class="solution-icon"><i class="bi bi-phone-fill"></i></div>

              <div class="solution-card-home">
                <h4>One click. Full audit pack.</h4>
                <p> Organised, current, traceable. Ready in minutes.</p>
              </div>
            </div>

          </div>
      </div>
      

    <div class="row mb-2">
      <div class="timeline-row">
        <div class="num-box">04</div>
        <div class="gap-card">
          <h4>Risk assessment done 3 years ago.</h4>
          <p>Sits in a folder. Hazard landscape has changed.</p>
        </div>
        <div class="gap-icon">
          <i class="bi bi-bell-fill"></i>
        </div>
        <div class="center-arrow">››</div>

        <div class="solution-wrap g-2">
          <div class="solution-icon"><i class="bi bi-phone-fill"></i></div>

          <div class="solution-card-home">
            <h4>Live risk register.</h4>
            <p>Linked to incidents and CAPAs. Flags reviews due.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-2">
      <div class="timeline-row">

        <div class="num-box">05</div>

        <div class="gap-card">
          <h4>Client asks for EHS data. </h4>
          <p> Report manually assembled. Numbers don't reconcile.</p>
        </div>

        <div class="gap-icon">
          <i class="bi bi-bell-fill"></i>
        </div>

        <div class="center-arrow">››</div>

        <div class="solution-wrap g-2">
          <div class="solution-icon"><i class="bi bi-phone-fill"></i></div>

          <div class="solution-card-home">
            <h4>Environmental data captured at source.</h4>
            <p> EHS metrics generated automatically.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<section class="ehs-mobile-section py-5 d-lg-none">
    <div class="container">

        <h2 class="section-title text-center">Common EHS Management Challenges</h2>
        <h3 class="section-sub text-center">5 Gaps Nobody Talks About</h3>

        <!-- CARD 1 -->
        <div class="mobile-gap-card red-theme mt-5">

            <div class="card-top-icon">
                <div class="icon-circle">
                    <i class="bi bi-bell-fill"></i>
                </div>
                <span class="badge-num">01</span>
            </div>

            <div class="card-body-content">
                <span class="label gap">THE GAP</span>
                <h4>Incident happens.</h4>
                <p>3 days later it is logged. Context is lost.</p>

                <div class="vs-divider">VS</div>

                <span class="label solution">SOAPBOX.CLOUD™</span>
                <h5>30-second mobile capture.</h5>
                <p>Photo. Geo-tag. Every stakeholder notified instantly.</p>
            </div>

            <div class="bottom-line"></div>
        </div>

        <!-- CARD 2 -->
        <div class="mobile-gap-card orange-theme">

            <div class="card-top-icon">
                <div class="icon-circle">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <span class="badge-num">02</span>
            </div>

            <div class="card-body-content">
                <span class="label gap">THE GAP</span>
                <h4>Corrective action assigned.</h4>
                <p>Written in a notebook. Never followed up.</p>

                <div class="vs-divider">VS</div>

                <span class="label solution">SOAPBOX.CLOUD™</span>
                <h5>Auto-created. Named owner.</h5>
                <p>Deadline tracked. Closure verified with evidence.</p>
            </div>

            <div class="bottom-line"></div>
        </div>

        <!-- CARD 3 -->
        <div class="mobile-gap-card purple-theme">

            <div class="card-top-icon">
                <div class="icon-circle">
                    <i class="bi bi-calendar-event-fill"></i>
                </div>
                <span class="badge-num">03</span>
            </div>

            <div class="card-body-content">
                <span class="label gap">THE GAP</span>
                <h4>Regulator gives 48 hours notice.</h4>
                <p>EHS Manager spends the night pulling files.</p>

                <div class="vs-divider">VS</div>

                <span class="label solution">SOAPBOX.CLOUD™</span>
                <h5>One click. Full audit pack.</h5>
                <p>Organised, current, traceable. Ready in minutes.</p>
            </div>

            <div class="bottom-line"></div>
        </div>

        <!-- CARD 4 -->
        <div class="mobile-gap-card blue-theme">

            <div class="card-top-icon">
                <div class="icon-circle">
                    <i class="bi bi-folder-fill"></i>
                </div>
                <span class="badge-num">04</span>
            </div>

            <div class="card-body-content">
                <span class="label gap">THE GAP</span>
                <h4>Risk assessment done 3 years ago.</h4>
                <p>Sits in a folder. Hazard landscape has changed.</p>

                <div class="vs-divider">VS</div>

                <span class="label solution">SOAPBOX.CLOUD™</span>
                <h5>Live risk register.</h5>
                <p>Linked to incidents and CAPAs. Flags reviews due.</p>
            </div>

            <div class="bottom-line"></div>
        </div>

        <!-- CARD 5 -->
        <div class="mobile-gap-card green-theme">

            <div class="card-top-icon">
                <div class="icon-circle">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>
                <span class="badge-num">05</span>
            </div>

            <div class="card-body-content">
                <span class="label gap">THE GAP</span>
                <h4>Client asks for EHS data.</h4>
                <p>Report manually assembled. Numbers don't reconcile.</p>

                <div class="vs-divider">VS</div>

                <span class="label solution">SOAPBOX.CLOUD™</span>
                <h5>Environmental data captured at source.</h5>
                <p>EHS metrics generated automatically.</p>
            </div>

            <div class="bottom-line"></div>
        </div>

    </div>
</section>
<section class="section-pad bg-gradient-customeblue py-5" id="modules">
  <div class="container">
    <!-- <div class="tag tag-green">LIVE NOW</div> -->
    <h2 class="section-title text-white">EHS Software Modules — Live Today</h2>
    <h3 class="section-sub text-white">Modules — Operational Today</h3>
    
      <div class="modules-slider-wrapper">
        
        <button class="nav-btn prev" aria-label="Scroll left">←</button>
        <div class="slider-container">

            @foreach ($modules as $module)

                <div class="panel {{ $loop->first ? 'active' : '' }}"
                    data-module-id="{{ $module->id }}"
                    data-module-slug="{{ $module->slug }}"
                    data-bg="{{ asset($module->image) }}">

                    <div class="content">

                        <h3>{{ $module->name }}</h3>

                        <p>
                            {{ Str::limit(strip_tags($module->short_description), 100) }}
                        </p>

                        <a href="{{route('modules.show', $module->slug)}}" class="nav-link text-third fs-6 mt-3">Learn more <i class="fa-solid fa-angles-right"></i></a>

                    </div>

                </div>

                @endforeach
                
                
        </div>
        <button class="nav-btn next" aria-label="Scroll right">→</button>
      </div>
    
    <p class="text-center text-white">All modules. All connected. All included.
      <a id="exploreBtn">
        Explore All Modules →
      </a>
    </p>
    <div id="modulesCard" class="modules-panel mt-4 d-none">
      @foreach($categories as $category)
          @if($category->modules->count())
              <div class="module-section">
                  <div class="module-title">
                      {{ strtoupper($category->name) }}
                  </div>
                  <div class="module-tags">
                      @foreach($category->modules as $module)
                          @if($module->is_live)
                              <a href="{{ route('modules.show', $module->slug) }}"
                                class="moduletag active">
                                  {{ $module->name }} ✓
                              </a>
                          @else
                              <span class="moduletag">
                                  {{ $module->name }} 🔜
                              </span>
                          @endif

                      @endforeach

                  </div>

              </div>
          @endif
      @endforeach

      <div class="module-footer">
          <span class="live">
              ✓ Live Now — {{ \App\Models\Module::where('is_live', 1)->count() }} modules
          </span>
      </div>

      <div class="hero-actions mt-4">
          <a href="{{ route('contact') }}" class="btn btn-custome text-white">
              Get in Touch
          </a>
      </div>
    </div>
  </div>
</section>
<section class="section-pad py-5" >
  <div class="container max-w-1000 " data-aos="fade-up">
    <div class="tag">BUILT FOR REAL PEOPLE</div>
    <h2 class="section-title">Who It Is For</h2>
    <h3 class="section-sub" >Three people. Three realities. One platform.</h3>
    <div class="row">
      <div class="col-md-4 pb-3">
          <div class="persona-card">
              <img src="{{ asset('images/OperationsDirector.webp') }}"
                  class="persona-image"
                  alt="Operations Director">
              <div class="persona-overlay"></div>
              <div class="persona-content">
                  <h4 class="persona-role">
                      Operations Director
                  </h4>
                  <div class="persona-details">
                      <div class="persona-pain">
                          <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                          Reads monthly Excel reports two weeks late.
                          Hopes nothing went wrong in the reporting gap.
                      </div>
                      <div class="persona-fix">
                          <span class="check-bold">✓</span>
                          One live dashboard. All sites.
                          All data. Right now.
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 pb-3">
          <div class="persona-card">
              <img src="{{ asset('images/HSEManager.webp') }}"
                  class="persona-image"
                  alt="Operations Director">
              <div class="persona-overlay"></div>
              <div class="persona-content">
                  <h4 class="persona-role">
                      HSE Manager
                  </h4>
                  <div class="persona-details">
                      <div class="persona-pain">
                          <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                          Compiles audit packs at midnight. Chases CAPAs by email. Knows every risk but can't prove it.
                      </div>
                      <div class="persona-fix">
                          <span class="check-bold">✓</span>
                           Everything organised. Everything retrievable. Time back for prevention.
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 pb-3">
          <div class="persona-card">
              <img src="{{ asset('images/HSEFloorWorker.webp') }}"
                  class="persona-image"
                  alt="Operations Director">
              <div class="persona-overlay"></div>
              <div class="persona-content">
                  <h4 class="persona-role">
                      Floor Worker
                  </h4>
                  <div class="persona-details">
                      <div class="persona-pain">
                          <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                           Noticed something unsafe. Didn’t report it. The form takes 20 minutes. Nothing happens anyway.
                      </div>
                      <div class="persona-fix">
                          <span class="check-bold">✓</span>
                            30-second mobile report. Received. Acted on. Your observation matters.
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
    </div>
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
      <p class="closer-quote">"Safety without environmental accountability is half a system. We built the whole thing."</p>
      <div class="trust-badges">
        <span class="trust-badge">ISO 45001</span>
        <span class="trust-badge">ISO 14001</span>
        <span class="trust-badge">IFC EHS</span>
        <span class="trust-badge">OSHA</span>
        <span class="trust-badge">DOSH</span>
        <span class="trust-badge">MENA</span>
      </div>
      <a href="{{ route('eap') }}" class="btn btn-first" onclick="showPage('eap')">Get Early Access →</a>
      <p class="closer-statement">SOAPBOX.CLOUD™ was conceived with conviction and built with precision — to protect the people
        who power industry and to preserve the environment that sustains it. This is not another
        spreadsheet. This is the operating system safety has always demanded.
      </p>
    </div>
  </div>
</section>

@if($popup)
<div class="custom-popup-overlay" id="homepagePopup">
    <div class="custom-popup-box">

        <button class="popup-close-btn" id="closePopup">
            ×
        </button>

        @if($popup->link)
            <a href="{{ $popup->link }}">
        @endif

        @if($popup->image)
            <img src="{{ asset($popup->image) }}"
                 alt="{{ $popup->title }}"
                 class="popup-image">
        @endif
        @if($popup->link)
            </a>
        @endif

    </div>
</div>
@endif

@endsection
@section('script')
<script src="{{asset('js/sliderscript.js')}}"></script>
@endsection
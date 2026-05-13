@extends('layouts.frontend')

@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'SOAPBOX.CLOUD™ | Intelligent Platform for Responsible Enterprises',
    'description' => $meta->meta_description ?? 'Manage compliance, safety, and risk workflows in one enterprise operating system. Soapbox Cloud helps regulated teams automate and stay audit-ready.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection

@section('content')

<section class="hero min-h-500">
  <div class="container">

    <div class="hero-content" data-aos="fade-up" >
      <div class="row">
        <div class="col-md-6">
          <p class="hero-livebadge mb-4 text-center">Intelligent Platform for <span class="text-first">Responsible Enterprises</span></p>
          <h1 class="fs-18 fw-normal text-muted">
            <span class="fw-semibold text-gradient-blue">SOAPBOX.CLOUD™</span> — The <span class="text-first fw-bold fs-18">EHS platform</span> built for operations that were never given the right tools.
          </h1>
          <div class="hero-stat mt-4" id="heroStat" data-aos="zoom-in">2,930,000</div>
          <p class="text-secondary mb-4">
            workers die every year from work-related accidents and diseases. 
            <span class="hero-source px-1">
              <i class="fa-solid fa-minus"></i> ILO, 2023
            </span>
          </p>
          <h3 class="text-first fw-semibold fs-5 my-4">No spreadsheet was ever designed to prevent this.</h3>
          <a class="btn btn-custome text-white me-2" href="#modules">See What's Live</a>
          <a href="{{ route('eap') }}#diagnostic" class="btn btn-custome1" onclick="showPage('eap')">Run your self-diagnosis →</a>
        </div>
        <div class="col-md-6 overflow-visible mt-3">
          <div class="hero-img-wrapper">
            <img src="{{ asset('images/dashboard-hero.webp') }}" alt="Dashboard Hero" class="hero-img" loading="lazy" />
        </div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="section-pad py-5" data-aos="zoom-in">
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
            <p class="founder-msg">"I spent 20+ years in regulated financial services watching compliance, audit, risk, and incident management live in separate systems. When something went wrong, nobody had the full picture. We built SOAPBOX.CLOUD™ to change that. One platform. Every obligation. Always connected."</p>
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
        <p class="platform">21 modules. Safety, environment, quality, risk, compliance — unified in one platform. Built for operations that take safety seriously, move fast, and demand real-time visibility from day one.</p>
        <div class="row g-3">
          <div class="col-md-6 col-lg-4">
            <div class="founder-box" data-aos="zoom-in" data-aos-delay="100">21 modules</div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="founder-box" data-aos="zoom-in" data-aos-delay="200">1 platform</div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="founder-box" data-aos="zoom-in" data-aos-delay="300">Live within in 7 days</div>
          </div>
        </div>
      </div>
    </div>
    <p class="tag-line text-center mt-4">Intelligent Platform for <span class="text-first">Responsible Enterprises</span></p>
  </div>
</section>
<section class="section-pad px-3 py-5">
  <div class="container max-w-1000" data-aos="fade-up">
    <div class="tag">RECOGNITION OVER PERSUASION</div>
    <h2 class="section-title">5 Gaps Nobody Talks About</h2>
    <h3 class="section-sub">If any of these sound familiar, SOAPBOX.CLOUD™ was built for you.</h3>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="bg-gradient-alert border-0 border-start border-4 border-warning px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10"> THE GAP</h4></div>
          <div class="gap-text">Incident happens. 3 days later it is logged. Context is lost.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-gradient-success border-0 border-start border-4 border-success px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10">SOAPBOX.CLOUD™</h4></div>
          <div class="gap-text" >30-second mobile capture. Photo. Geo-tag. Every stakeholder notified instantly.</div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="bg-gradient-alert border-0 border-start border-4 border-warning px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10"> THE GAP</h4></div>
          <div class="gap-text">Corrective action assigned. Written in a notebook. Never followed up.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-gradient-success border-0 border-start border-4 border-success px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10">SOAPBOX.CLOUD™</h4></div>
          <div class="gap-text" >Auto-created. Named owner. Deadline tracked. Closure verified with evidence.</div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="bg-gradient-alert border-0 border-start border-4 border-warning px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10"> THE GAP</h4></div>
          <div class="gap-text">Regulator gives 48 hours notice. EHS Manager spends the night pulling files.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-gradient-success border-0 border-start border-4 border-success px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10">SOAPBOX.CLOUD™</h4></div>
          <div class="gap-text" >One click. Full audit pack. Organised, current, traceable. Ready in minutes.</div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="bg-gradient-alert border-0 border-start border-4 border-warning px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10"> THE GAP</h4></div>
          <div class="gap-text">Risk assessment done 3 years ago. Sits in a folder. Hazard landscape has changed.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-gradient-success border-0 border-start border-4 border-success px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10">SOAPBOX.CLOUD™</h4></div>
          <div class="gap-text" >Live risk register. Linked to incidents and CAPAs. Flags reviews due. Always current.</div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="bg-gradient-alert border-0 border-start border-4 border-warning px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10"> THE GAP</h4></div>
          <div class="gap-text">Client asks for EHS data. Report manually assembled. Numbers don't reconcile.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-gradient-success border-0 border-start border-4 border-success px-3 py-3" data-aos="fade-up">
          <div class="gap-label">
            <h4 class="fs-10">SOAPBOX.CLOUD™</h4></div>
          <div class="gap-text" >Environmental data captured at source. EHS metrics generated automatically.</div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-pad bg-light-blue py-5" id="modules">
  <div class="container max-w-1000">
    <div class="tag tag-green">LIVE NOW</div>
    <h2 class="section-title">Six Modules — Operational Today</h2>
    <h3 class="section-sub">Enterprise-grade capabilities. Ready from day one.</h3>
    <div class="row">
      @foreach ($modules as $module)
      <div class="col-md-6 mb-4">
        <div class="flip-card" data-aos="zoom-in" data-aos-delay="100">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="{{ $module->image ? asset($module->image) : asset('images/image.jfif') }}" alt="{{ $module->title }}" class="img-fluid module-img" loading="lazy">
            </div>
            <div class="flip-card-back">
              <div class="card-body p-2">
                <h5 class="card-title text-first fw-bold mb-2">{{ $module->name }}</h5>
                {!! $module->short_description !!}
                <a href="{{route('modules.show', $module->slug)}}" class="nav-link text-third fs-6 mt-3">Learn more <i class="fa-solid fa-angles-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <p class="text-center">Plus 15 more modules. All connected. All included.
      <a id="exploreBtn">
        Explore All Modules →
      </a>
    </p>
    <div id="modulesCard" class="modules-panel mt-4 d-none">
      <div class="module-section">
        <div class="module-title">SAFETY & INCIDENT</div>
        <div class="module-tags">
          <span class="moduletag active">Incident Management ✓</span>
          <span class="moduletag">Near-Miss Reporting 🔜</span>
          <span class="moduletag">Safety Observation 🔜</span>
          <span class="moduletag">Event Tracking 🔜</span>
          <span class="moduletag">Job Safety Analysis 🔜</span>
        </div>
      </div>
      <div class="module-section">
        <div class="module-title">RISK & COMPLIANCE</div>
        <div class="module-tags">
          <span class="moduletag active">Risk Management ✓</span>
          <span class="moduletag active">Audit Management ✓</span>
          <span class="moduletag active">CAPA Management ✓</span>
          <span class="moduletag active">Compliance Management ✓</span>
          <span class="moduletag active">NCR ✓</span>
          <span class="moduletag">Operational Risk 🔜</span>
        </div>
      </div>
      <div class="module-section">
        <div class="module-title">Work Authorisation</div>
        <div class="module-tags">
          <span class="moduletag">Permit to Work 🔜</span>
          <span class="moduletag">Hot Work Permit 🔜</span>
          <span class="moduletag">Inspection Management 🔜</span>
          <span class="moduletag">Checklists Management 🔜</span>
        </div>
      </div>
      <div class="module-section">
        <div class="module-title">WORKFORCE</div>
        <div class="module-tags">
          <span class="moduletag">Training & Competency 🔜</span>
          <span class="moduletag">Occupational Health 🔜</span>
          <span class="moduletag">Change Management 🔜</span>
        </div>
      </div>
      <div class="module-section">
        <div class="module-title">Environmental & Documents</div>
        <div class="module-tags">
          <span class="moduletag">HAZMAT Management 🔜</span>
          <span class="moduletag">Waste Management 🔜</span>
          <span class="moduletag">Documentation Management 🔜</span>
        </div>
      </div>
      <div class="module-footer">
        <span class="live">✓ Live Now — 6 modules</span>
        <span class="coming ">Coming Soon — 15 modules</span>
      </div>
      <div class="hero-actions mt-4">
        <a href="{{{ route('eap') }}}" class="btn btn-custome text-white">Get Early Access</a>
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
      <div class="col-md-4 pb-3" >
        <div class="card border-0 rounded-4 shadow border-top border-success border-4 min-h-200">
          <div class="card-body">
            <h4 class="persona-role text-green">Operations Director</h4>
            <div class="persona-pain"><i class="fa-solid fa-triangle-exclamation text-warning"></i> Reads monthly Excel reports two weeks late. Hopes nothing went wrong in the reporting gap.</div>
            <div class="persona-fix"><span class=" check-bold">✓</span> One live dashboard. All sites. All data. Right now.</div>
          </div>
        </div>
      </div>
      <div class="col-md-4 pb-3">
        <div class="card border-0 rounded-4 shadow border-top border-primary border-4 min-h-200">
          <div class="card-body">
            <h4 class="persona-role text-blue"> HSE Manager</h4>
            <div class="persona-pain"><i class="fa-solid fa-triangle-exclamation text-warning"></i> Compiles audit packs at midnight. Chases CAPAs by email. Knows every risk but can't prove it.</div>
            <div class="persona-fix"><span class=" check-bold">✓</span> Everything organised. Everything retrievable. Time back for prevention.</div>
          </div>
        </div>
      </div>
      <div class="col-md-4 pb-3">
        <div class="card border-0 rounded-4 shadow border-top border-danger border-4 min-h-200">
          <div class="card-body">
            <h4 class="persona-role text-amber">Floor Worker</h4>
            <div class="persona-pain"><i class="fa-solid fa-triangle-exclamation text-warning"></i> Noticed something unsafe. Didn’t report it. The form takes 20 minutes. Nothing happens anyway.</div>
            <div class="persona-fix"><span class=" check-bold">✓</span> 30-second mobile report. Received. Acted on. Your observation matters.</div>
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
@endsection
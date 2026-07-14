@extends('layouts.frontend')
@section('meta')
@include('partials.meta', [
  'title' => $module->meta_title ?? $module->name . ' | SOAPBOX.CLOUD™',
  'description' => $module->meta_description ?? 'Get first access to Soapbox enterprise cloud platform for compliance, safety, quality, and governance. Join the Early Adopters Program.',
  'keywords' => $module->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
@section('pageSchema')
{
  "@type":"Service",
  "@id":"{{ url()->current() }}#service",
  "name":"{{ $module->title }}",
  "description":"{{ $module->short_description }}",
  "url":"{{ url()->current() }}",
  "provider":{
    "@id":"https://soapbox.cloud/#organization"
  },
  "areaServed":{
    "@type":"Place",
    "name":"Global"
  },
  "serviceType":"{{ $module->title }}",
  "inLanguage":"en"
}
@endsection
@section('content')
<section class="hero module-hero" style="{{ $module->banner_image ? 'background-image: url(' . asset($module->banner_image) . ');' : '' }}">
  <div class="container " data-aos="zoom-in">
    <div class="row">
      <div class="col-lg-9 col-xl-8">

        <div class="hero-livebadge mx-auto mb-4">
          <span class="dot"></span>
          LIVE — Available Now
        </div>
        <h1 class="hero-title text-white">{{ $module->name }} Software</h1>
        <h3 class="section-sub mx-auto mb-4">
          {!! $module->short_description !!}
        </h3>
        <div class="d-flex flex-column flex-sm-row gap-3">
          <a href="{{ route('eap') }}" class="btn btn-custome text-white">
            Take the 30-sec EHS Check
            <span class="ms-2">&rarr;</span>
          </a>
          <a href="https://calendly.com/mohammed-moizuddin-soapbox/30min" class="btn-custome1">
            Schedule a Call
          </a>
        </div>
      </div>
      
    </div>
  </div>
</section>
@if($module->challengers->count())
<section class="bg-light py-5">
  <div class="container max-w-1200">
    <div class="tag">THE CHALLENGE</div>
    <h2 class="section-title">
    {{ $module->challenger_heading ?? 'Challenges' }}
    </h2>
    <div class="row mb-2">
      @foreach($module->challengers as $item)
      <div class="col-md-6 mb-1">
        <div class="border-0 border-start border-4 {{ $loop->iteration % 2 == 0 ? 'bg-gradient-danger border-danger' : 'bg-gradient-alert border-warning' }} px-3 py-3" data-aos="fade-up">
          <h4 class="gap-label">{{ $item->name }}</h4>
          <p class="mb-0 small">{{ $item->description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@if($module->solutions->count())
<section class="solution-section py-5 py-lg-6 position-relative overflow-hidden">
    <div class="container max-w-1200">

        <!-- Top Heading -->
        <div class="text-center mb-5">
            <div class="tag text-green mb-2">
                HOW SOAPBOX.CLOUD™ SOLVES IT
            </div>

            <h2 class="section-title mb-3">
                {{ $module->solution_heading ?? 'Solutions' }}
            </h2>

            <p class="text-muted mx-auto solution-subtitle">
                From planning to closure, Soapbox.Cloud™ delivers clarity,
                accountability and continuous improvement.
            </p>
        </div>

        <!-- Cards -->
        <div class="row g-4">

            @foreach($module->solutions as $key => $item)
            <div class="col-md-6 p-3" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">

                <div class="solution-card h-100 position-relative">

                    <!-- Top Row -->
                    <div class="d-flex align-items-start gap-3 mb-4">

                        @if($item->image)
                        <div class="solution-icon">
                            <img src="{{ asset($item->image) }}" width="38" alt="{{ $item->name }}">
                        </div>
                        @endif

                        <div>
                            <h4 class="solution-title mb-2">
                                {{ $item->name }}
                            </h4>

                            <p class="text-muted mb-0 small">
                                {{ Str::limit(strip_tags($item->description), 95) }}
                            </p>
                        </div>

                    </div>

                    <!-- Description -->
                    <div class="solution-content">
                        {!! $item->description !!}
                    </div>

                    <!-- Big Number -->
                    <span class="solution-number">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
@if($module->keyCapabilities->count())
<section class="bg-light py-5">
  <div class="container max-w-1200">
    <div class="tag mb-2 ">KEY CAPABILITIES</div>
    <h2 class="section-title">What the Module Delivers.</h2>
    <table class="table table-lg table-hover bg-transparent rounded-4 overflow-hidden" data-aos="fade-up">
        <thead class="table-forth">
            <tr>
                <th class="text-white">Capability</th>
                <th class="text-white">What it does</th>
            </tr>
        </thead>
        <tbody>
          @foreach($module->keyCapabilities as $item)
          <tr>
            <td class="small table-light fw-bold">{{ $item->name }}</td>
            <td class="small table-light">{{ $item->description }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</section>
@endif
@if($module->uses->count())
<section class="py-5 bg-gradient-customeblue">
  <div class="container max-w-1200">
    <div class="tag mb-2 text-white">WHO USES THIS</div>
    <h2 class="section-title text-white">Built for Every Role in the Safety Chain.</h2>
    <div class="row d-flex g-4 my-4" data-aos="fade-up">
      @foreach($module->uses as $item)
      <div class="col-md-4">
        <div class="glass-effect p-4 min-h-140">
          <h4 class="fw-semibold text-success fs-16">
            {{ $item->name }}
          </h4>
          <p class="text-visible mt-2 mb-0 small">
            {{ $item->description }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@if($module->measurables->count())
<section class=" bg-light py-5">
  <div class="container max-w-1200">
    <div class="tag mb-2 text-green">MEASURABLE OUTCOMES</div>
    <h2 class="section-title">The Numbers That Change.</h2>
    <div class="row row-cols-2 row-cols-md-5 text-center border rounded-4 overflow-hidden stats-wrapper" data-aos="zoom-in">
      @foreach($module->measurables as $item)
      <div class="col-md-4 col-lg p-4 border-end">
        <h4 class="fw-semibold text-green fs-16">{{ $item->name }}</h4>
        <div class="text-muted small">{{ $item->description }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@if($module->frameworks->count())
<section class="py-5">
  <div class="container max-w-1200">
    <div class="tag mb-2 ">COMPLIANCE FRAMEWORKS SUPPORTED</div>
    <ul class="nav mt-4">
      @foreach($module->frameworks as $item)
      <li>
          <div class="card bg-light border-muted me-2 mb-2" data-aos="fade-up">
            <div class="card-body px-3 py-1">
                <p class="mb-0 small">{{ $item->name }}</p>
            </div>
          </div>
      </li>
      @endforeach
      <li>
        <span class="hero-source px-1 my-2" data-aos="fade-up">
          And more
        </span>
      </li>
    </ul>
  </div>
</section>
@endif
<section class="bg-light py-5">
  <div class="container max-w-1200">
    <div class="tag mb-2 ">RELATED MODULES</div>
    <h2 class="section-title">Connected by Design.</h2>
    <div class="row g-4 mt-4">
      @foreach ($randomModules as $randomModule)
      <div class="col-md-4">
        <div class="vision-card text-center p-4">
          <a href="{{ route('modules.show', $randomModule->slug) }}" class="text-decoration-none text-blue">{{ $randomModule->name }} →</a>
        </div>
        
      </div>
      
      @endforeach
    </div>
  </div>
</section>
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
@if ($module->cta)
<section class="closer">
  <div class="container px-3  justify-content-center text-center text-white">
    <div class="closer-content max-w-1200">
      <p class="closer-quote">
        {!! $module->cta !!}
      </p>
      <a href="{{ route('eap') }}" class="btn btn-first" onclick="showPage('eap')">Take the 30-sec EHS Check →</a>
    </div>
  </div>
</section>
@endif
@endsection
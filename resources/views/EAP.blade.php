@extends('layouts.frontend')
@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'Early Adopters Program for Soapbox Cloud | Join Now',
    'description' => $meta->meta_description ?? 'Get first access to Soapbox enterprise cloud platform for compliance, safety, quality, and governance. Join the Early Adopters Program.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
@section('style')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: #F7F9FC;
      min-height: 100dvh;
    }

    button {
      font-family: inherit;
      cursor: pointer;
    }

    button:hover {
      opacity: 0.92;
    }

    a {
      font-family: inherit;
    }

    input[type="range"] {
      -webkit-appearance: none;
      appearance: none;
      height: 6px;
      background: #E5E7EB;
      border-radius: 3px;
      outline: none;
    }

    input[type="range"]::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 22px;
      height: 22px;
      background: #1E63AC;
      border-radius: 50%;
      cursor: pointer;
      border: 3px solid white;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 11px 14px;
      border-radius: 10px;
      border: 1px solid #E5E7EB;
      font-size: 14px;
      font-family: inherit;
      outline: none;
      background: #F7F9FC;
      box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
      border-color: #1E63AC;
    }

    /* ── App container ── */
    #app {
      max-width: 920px;
      margin: 0 auto;
      padding: 16px 16px 24px;
    }

    /* ── Header ── */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .logo {
      font-size: 12px;
      font-weight: 800;
      color: #1E63AC;
      letter-spacing: 1.5px;
    }

    .q-counter {
      font-size: 10px;
      color: #AAA;
      font-weight: 600;
    }

    /* ── Progress ── */
    .progress-bar {
      height: 3px;
      background: #E5E7EB;
      border-radius: 2px;
      margin-bottom: 5px;
    }

    .progress-fill {
      height: 3px;
      border-radius: 2px;
      transition: width .5s ease, background .5s;
    }

    .phase-label {
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 2px;
      margin-bottom: 14px;
    }

    /* ── Two-col layout ── */
    .cols {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }

    .col-left {
      flex: 1 1 300px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      min-width: 0;
    }

    .col-right {
      flex: 1 1 360px;
      background: #fff;
      border-radius: 20px;
      padding: 24px 20px;
      box-shadow: 0 2px 16px rgba(0, 0, 0, 0.04);
      min-width: 0;
    }

    /* ── Gauge card ── */
    .gauge-card {
      background: #fff;
      border-radius: 14px;
      padding: 10px;
      box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
      text-align: center;
    }

    .gauge-wrap {
      position: relative;
      width: 80px;
      height: 80px;
      margin: 0 auto;
    }

    .gauge-wrap svg {
      transform: rotate(-90deg);
    }

    .gauge-inner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .gauge-score {
      font-size: 16px;
      font-weight: 800;
      line-height: 1;
    }

    .gauge-denom {
      font-size: 6px;
      color: #AAA;
      margin-top: 1px;
    }

    .gauge-label {
      font-size: 8px;
      font-weight: 700;
      margin-top: 4px;
    }

    .gauge-narr {
      font-size: 10px;
      color: #AAA;
      font-weight: 600;
      font-style: italic;
      margin-top: 6px;
    }

    /* ── Fact card ── */
    .fact-card {
      border-radius: 16px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      min-height: 260px;
      overflow: hidden;
      background-size: cover;
      background-position: center;
      transition: all .3s ease;
    }

    .fact-inner {
      padding: 70px 22px 22px;
    }

    .fact-tag {
      font-size: 11px;
      font-weight: 700;
      color: #86EFAC;
      letter-spacing: 2px;
      margin-bottom: 10px;
    }

    .fact-hl {
      font-size: 16px;
      font-weight: 800;
      color: #fff;
      line-height: 1.45;
      margin-bottom: 10px;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .fact-bd {
      font-size: 12px;
      color: rgba(255, 255, 255, 0.9);
      line-height: 1.6;
    }

    .fact-src {
      font-size: 10px;
      color: #86EFAC;
      margin-top: 10px;
      font-weight: 600;
    }

    /* ── Question ── */
    .q-title {
      font-size: 18px;
      font-weight: 800;
      color: #0D2B4E;
      margin-bottom: 16px;
      line-height: 1.4;
    }

    /* ── Options ── */
    .opt-icon-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
      gap: 8px;
    }

    .opt-icon-btn {
      padding: 12px 4px;
      border-radius: 12px;
      border: 1px solid #E5E7EB;
      background: #fff;
      text-align: center;
      transition: all .2s;
    }

    .opt-icon-btn .icon {
      font-size: 26px;
    }

    .opt-icon-btn .lbl {
      font-size: 9px;
      color: #0D2B4E;
      font-weight: 700;
      margin-top: 4px;
      line-height: 1.2;
    }

    .opt-size-list {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .opt-size-btn {
      padding: 16px 18px;
      border-radius: 14px;
      border: 1px solid #E5E7EB;
      background: #fff;
      text-align: left;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: all .2s;
    }

    .opt-size-btn .icon {
      font-size: 28px;
      width: 40px;
      text-align: center;
    }

    .opt-size-btn .lbl {
      font-size: 15px;
      font-weight: 700;
      color: #0D2B4E;
    }

    .opt-size-btn .sub {
      font-size: 11px;
      color: #999;
      margin-top: 2px;
    }

    .opt-cal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(95px, 1fr));
      gap: 10px;
    }

    .opt-cal-btn {
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid #E5E7EB;
      background: #fff;
      text-align: center;
      padding: 0;
      transition: all .2s;
    }

    .opt-cal-top {
      background: #1E63AC;
      color: #fff;
      font-size: 9px;
      font-weight: 800;
      padding: 6px 0;
      letter-spacing: 1.5px;
    }

    .opt-cal-bot {
      padding: 10px 6px;
      font-size: 12px;
      font-weight: 700;
      color: #0D2B4E;
      line-height: 1.3;
    }

    .opt-dash-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
      gap: 8px;
    }

    .opt-dash-btn {
      padding: 14px 12px;
      border-radius: 14px;
      border: none;
      text-align: left;
      color: #fff;
      transition: all .2s;
      opacity: 0.82;
    }

    .opt-dash-btn .icon {
      font-size: 18px;
      margin-bottom: 6px;
    }

    .opt-dash-btn .lbl {
      font-size: 10px;
      font-weight: 700;
      line-height: 1.3;
    }

    .opt-clock-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .opt-clock-btn {
      padding: 16px;
      border-radius: 14px;
      border: 1px solid #E5E7EB;
      background: #fff;
      text-align: center;
      transition: all .2s;
    }

    .opt-clock-btn .lbl {
      font-size: 14px;
      font-weight: 700;
      color: #0D2B4E;
      margin-top: 8px;
    }

    .opt-multi-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
      gap: 8px;
    }

    .opt-multi-btn {
      padding: 14px 12px;
      border-radius: 14px;
      border: 1px solid #E5E7EB;
      background: #fff;
      text-align: center;
      transition: all .2s;
    }

    .opt-multi-btn .lbl {
      font-size: 11px;
      color: #0D2B4E;
      font-weight: 600;
      line-height: 1.3;
    }

    .opt-multi-btn .metric {
      font-size: 22px;
      font-weight: 800;
    }

    .opt-multi-btn .unit {
      font-size: 8px;
      font-weight: 600;
      margin-top: 2px;
    }

    .opt-multi-btn .check {
      font-size: 9px;
      color: #666;
      margin-top: 4px;
    }

    .multi-count {
      font-size: 11px;
      color: #AAA;
      margin-top: 8px;
      font-weight: 600;
    }

    .opt-card-list {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .opt-card-btn {
      padding: 14px 16px;
      border-radius: 10px;
      border: 1px solid #E5E7EB;
      background: #fff;
      text-align: left;
      font-size: 14px;
      color: #0D2B4E;
      font-weight: 500;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: all .2s;
    }

    /* selected state */
    .selected-opt {
      background: #E8F5E1 !important;
      border-color: #56B62B !important;
      transform: scale(0.97);
    }

    .check-mark {
      color: #56B62B;
      font-weight: 800;
      font-size: 16px;
      margin-left: 8px;
    }

    .dash-selected {
      background: #E8F5E1 !important;
      border: 2px solid #56B62B !important;
      color: #56B62B !important;
      transform: scale(0.97);
    }

    .multi-selected {
      border: 2px solid #56B62B !important;
      background: #E8F5E1 !important;
    }

    .cal-sel-top {
      background: #56B62B !important;
    }

    /* ── Back button ── */
    .back-btn {
      margin-top: 14px;
      padding: 8px 16px;
      background: #F7F9FC;
      border: 1px solid #E5E7EB;
      border-radius: 8px;
      color: #888;
      font-size: 12px;
      font-weight: 600;
    }

    .dash-card::before {
    opacity: 0.7;
    }

    /* ── Slide animation ── */
    .slide-in {
      animation: slideIn .3s ease forwards;
    }

    .slide-out {
      animation: slideOut .3s ease forwards;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateX(16px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideOut {
      from {
        opacity: 1;
        transform: translateX(0);
      }

      to {
        opacity: 0;
        transform: translateX(-16px);
      }
    }

    /* ── Next / submit buttons ── */
    .btn-primary {
      width: 100%;
      padding: 13px 0;
      border-radius: 12px;
      border: none;
      color: #fff;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: 0.5px;
      margin-top: 14px;
    }

    .btn-submit {
      width: 100%;
      padding: 14px 0;
      border-radius: 12px;
      border: none;
      background: #1E63AC;
      color: #fff;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: 0.5px;
      margin-top: 8px;
      cursor: pointer;
    }

    .btn-submit:disabled {
      background: #E5E7EB;
      color: #999;
      cursor: default;
    }

    /* ── Results page ── */
    .results-wrap {
      max-width: 880px;
      margin: 0 auto;
      padding: 20px 16px;
    }

    .results-header {
      text-align: center;
      margin-bottom: 24px;
    }

    .results-logo {
      font-size: 20px;
      font-weight: 800;
      color: #1E63AC;
      letter-spacing: 2px;
    }

    .results-title {
      font-size: 18px;
      font-weight: 800;
      color: #0D2B4E;
      margin-top: 6px;
    }

    .results-cols {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
    }

    .res-left {
      flex: 1 1 340px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
    }

    .res-right {
      flex: 1 1 340px;
      background: #fff;
      border-radius: 20px;
      padding: 28px;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
    }

    .res-score-panel {
      padding: 36px;
      text-align: center;
    }

    .res-readiness-label {
      font-size: 10px;
      color: rgba(255, 255, 255, 0.6);
      letter-spacing: 1.5px;
      margin-top: 20px;
    }

    .res-score-big {
      font-size: 38px;
      font-weight: 800;
      color: #86EFAC;
    }

    .res-score-big span {
      font-size: 14px;
      color: #86EFAC;
      opacity: 0.7;
    }

    .res-body {
      background: #fff;
      padding: 24px;
    }

    .res-msg {
      font-size: 14px;
      color: #444;
      line-height: 1.7;
      font-weight: 500;
    }

    .res-brand {
      margin-top: 20px;
      padding: 16px;
      border-radius: 12px;
      background: #F7F9FC;
      text-align: center;
    }

    .res-brand-name {
      font-size: 24px;
      font-weight: 800;
      color: #1E63AC;
      letter-spacing: 2px;
    }

    .res-brand-sub {
      font-size: 10px;
      color: #999;
      margin-top: 4px;
      letter-spacing: 0.5px;
    }

    .res-brand-note {
      font-size: 9px;
      color: #BBB;
      margin-top: 8px;
      font-style: italic;
    }

    .success-box {
      margin-top: 16px;
      padding: 16px;
      background: #E8F5E1;
      border-radius: 12px;
      text-align: center;
    }

    .success-title {
      font-size: 14px;
      font-weight: 700;
      color: #56B62B;
    }

    .success-msg {
      font-size: 12px;
      color: #555;
      margin-top: 6px;
      line-height: 1.5;
    }

    .success-links {
      margin-top: 12px;
      display: flex;
      gap: 12px;
      justify-content: center;
    }

    .success-links a {
      font-size: 11px;
      color: #1E63AC;
      text-decoration: none;
      font-weight: 600;
    }

    .form-label {
      font-size: 10px;
      color: #888;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      display: block;
      margin-bottom: 4px;
    }

    .form-field {
      margin-bottom: 14px;
    }

    .unlock-title {
      font-size: 18px;
      font-weight: 800;
      color: #0D2B4E;
      margin-bottom: 6px;
    }

    .unlock-desc {
      font-size: 13px;
      color: #555;
      margin-bottom: 8px;
      line-height: 1.5;
    }

    .unlock-note {
      font-size: 11px;
      color: #1E63AC;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .form-note {
      text-align: center;
      margin-top: 12px;
      font-size: 10px;
      color: #BBB;
      font-style: italic;
    }

    /* ── Gauge SVG circle transition ── */
    .gauge-circle {
      transition: stroke-dashoffset 1s ease, stroke 1s ease;
    }

    /* ── Mobile ── */
    @media (max-width: 767px) {
      .col-left {
        order: 2;
      }

      .col-right {
        order: 1;
      }
    }
  </style>
@endsection
@section('content')
<link href="{{asset('css/newstyle.css')}}" rel="stylesheet"/>
<section class="hero m-1000 d-flex align-items-center min-h-500 eap-hero">
    <div class="container" data-aos="zoom-in">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8">
                <!-- Heading -->
                <h1 class="hero-title mb-4 text-white">
                EHS built for how <br>
                operations <span class="hero-highlight">actually work</span>
                </h1>
                <!-- Subtext -->
                <h3 class="hero-subtitle mx-auto mb-5 fw-normal text-white">
                    Not a spreadsheet. Not a bloated enterprise suite. A better middle
                    path — structured enough for compliance, practical enough for the
                    field.
                </h3>
                <!-- Buttons -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-custome text-white" id="scrollToDiagnostic">
                        Get in Touch
                        <span class="ms-2">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fit-section py-5">
    <div class="container  fit-container text-center"  data-aos="fade-up">
        <h2 class="section-title">
            We are not looking for everyone
        </h2>
        <h3 class="fit-subtext">
            We are looking for teams that know their current model is starting to break,
            want a better way forward, and are willing to help shape a product built for
            mid-market operations.
        </h3>
        <div class="row justify-content-center g-4 fit-cards-row">
            <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                <div class="fit-card fit-card-good text-start">
                    <h4 class="fit-card-label fit-card-label-good">GOOD FIT</h4>
                    <ul class="fit-list fit-list-good">
                        <li>50–5,000 employees, multi-site ops</li>
                        <li>Currently on spreadsheets or legacy tools</li>
                        <li>Reporting friction is a real daily problem</li>
                        <li>Open to a scoped pilot approach</li>
                        <li>EHS performance is on leadership radar</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                <div class="fit-card fit-card-bad text-start">
                    <h4 class="fit-card-label fit-card-label-bad">NOT RIGHT NOW</h4>
                    <ul class="fit-list fit-list-bad">
                        <li>Single-person operation, no formal EHS</li>
                        <li>Already on a mature enterprise platform</li>
                        <li>Need a full solution from day one</li>
                        <li>No leadership buy-in for change</li>
                        <li>No defined EHS accountability</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="fit-cta">
            <a href="{{ route('contact') }}" class="btn fit-btn">
                Get in Touch
                <span class="ms-2">&rarr;</span>
            </a>
        </div>
    </div>
</section>

<section class="py-5 bg-light-blue" id="how-it-works">
    <div class="container max-w-1000 middle-market-container ">
       
          <h2 class="common-title">
          EHS software built for the middle market, not the enterprise giants.
          </h2>
          <p class="sub-text">
            You've outgrown spreadsheets and manual coordination. But the enterprise EHS platforms are overbuilt, overpriced, and take months to roll out. There's a better path between the two:
            Simple enough to roll out without months of friction , Practical enough for operations , Simple enough to roll out without months of friction
          </p>
          <p class="sub-text">
            The self-EHS Check shows you where your current EHS setup is creating delay, blind spots, reporting friction or control gaps, and whether SOAPBOX.CLOUD is the right fit for your team.
          </p>

               
            
            <!-- RIGHT CARDS -->
            <div class="row justify-content-center g-4 my-3">
              <div class="col-md-6">
                <div class="feature-box">
                    <h4 class="feature-box-title">Incidents surface in minutes, not days.</h4>
                    <p class="feature-box-text">
                        Field-friendly incident reporting that works even in low-connectivity environments. The event reaches the right people while it still matters.
                    </p>
                </div>

              </div>
              <div class="col-md-6">

                <div class="feature-box">
                    <h4 class="feature-box-title">No corrective action falls through the cracks.</h4>
                    <p class="feature-box-text">
                        CAPAs assigned, tracked and escalated automatically, with AI Assist drafting stronger actions and flagging what's incomplete before closure.
                    </p>
                </div>
              </div>
            </div>
            <div class="row justify-content-center g-4 my-3">
              <div class="col-md-6">
                  <div class="feature-box">
                    <h4 class="feature-box-title">Audit-ready by default. Never the night before.</h4>
                    <p class="feature-box-text">
                      Evidence organised as you work. No pre-audit scramble. Twelve months of records, retrievable in seconds.
                    </p>
                  </div>
              </div>
              <div class="col-md-6">
              <div class="feature-box">
                        <h4 class="feature-box-title">Leadership sees every site, live.</h4>
                        <p class="feature-box-text">
                            Cross-site dashboards give management one consolidated view, without waiting for someone to compile a report.
                        </p>
                    </div>
              </div>
            </div>
          <a href="{{ route('contact') }}" class="btn middle-market-btn">
            Get in Touch
            <span class="ms-2">&rarr;</span>
          </a>

    </div>
</section>

<section class="founder-access-section py-5">
    <div class="container founder-access-container"  data-aos="fade-up">
        <!-- Top Label -->
        <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-8">
                <h2 class="founder-title">
                Founder-tier access to the EHS platform you help shape.
                </h2>
                <h3 class="founder-subtitle">
                    Move first and you don't just get early access. You get permanent advantages, and a direct hand in what gets built next.
                </h3>
            </div>
        </div>
        <!-- Cards -->
        <div class="row g-4 justify-content-center founder-cards-row">
            <div class="col-md-6 col-lg-3 py-1" data-aos="zoom-in">
                <div class="founder-card h-100">
                    <span class="founder-card-number">01</span>
                    <h4 class="founder-card-title">Founder pricing, locked for good</h4>
                    <p class="founder-card-text">
                        Early-adopter rates secured permanently. Your price never moves as the platform grows.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-1" data-aos="zoom-in" data-aos-delay="500">
                <div class="founder-card h-100">
                    <span class="founder-card-number">02</span>
                    <h4 class="founder-card-title">A direct line into the roadmap</h4>
                    <p class="founder-card-text">
                        Your operational reality decides what we build next. Not a feature request form, a seat at the table.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-1" data-aos="zoom-in" data-aos-delay="500">
                <div class="founder-card h-100">
                    <span class="founder-card-number">03</span>
                    <h4 class="founder-card-title">Start with one site. Prove it first.</h4>
                    <p class="founder-card-text">
                        Pilot one workflow, one team, one location. See the value before you commit to anything wider.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-1" data-aos="zoom-in">
                <div class="founder-card h-100">
                    <span class="founder-card-number">04</span>
                    <h4 class="founder-card-title">We configure it with you</h4>
                    <p class="founder-card-text">
                        Your environment set up alongside your team, not a generic onboarding flow handed to IT.
                    </p>
                </div>
            </div>
        </div>
        <!-- CTA -->
        <div class="row justify-content-center text-center">
            <div class="col-auto">
                <a href="{{ route('contact') }}" class="btn founder-btn">
                    Get in Touch
                    <span class="ms-2">&rarr;</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center text-center">
      <h2 class="section-title mb-2">
        Every EHS gap already costs you.<br>
        Most are still hidden.
      </h2>
            
      <form id="diag-form diagnostic" action="{{ route('ehs-assessment-store') }}" method="POST" novalidate>
        @csrf
        <div id="app"></div>
      </form>
      <h3 class="section-sub mx-auto mb-5 fw-normal">
        Get your site-specific gap analysis with recommended corrective actions, EHS Readiness rating, and estimated risk score.
      </h3>
    </div>
  </div>
</section>


@endsection
@section('script')
<script>
// ══════════════════════════════════════════════════════════════
//  DATA
// ══════════════════════════════════════════════════════════════
const BLUE = "#1E63AC", GREEN = "#56B62B", NAVY = "#0D2B4E";
const AMBER = "#D97706", W = "#FFFFFF";

const phaseGrad = {
  1: "linear-gradient(160deg,#0A1628 0%,#1E63AC 50%,#2980B9 100%)",
  2: "linear-gradient(160deg,#451A03 0%,#D97706 50%,#F59E0B 100%)",
  3: "linear-gradient(160deg,#450A0A 0%,#DC2626 50%,#EF4444 100%)",
  4: "linear-gradient(160deg,#052E16 0%,#16A34A 50%,#56B62B 100%)"
};
const phaseClr = { 1: GREEN, 2: AMBER, 3: "#DC2626", 4: BLUE };
const dashGrads = [
  "linear-gradient(135deg,#10B981,#059669)", "linear-gradient(135deg,#06B6D4,#0891B2)",
  "linear-gradient(135deg,#3B82F6,#2563EB)", "linear-gradient(135deg,#F59E0B,#D97706)",
  "linear-gradient(135deg,#8B5CF6,#7C3AED)", "linear-gradient(135deg,#EC4899,#DB2777)",
  "linear-gradient(135deg,#14B8A6,#0D9488)", "linear-gradient(135deg,#F97316,#EA580C)",
  "linear-gradient(135deg,#6366F1,#4F46E5)", "linear-gradient(135deg,#EF4444,#DC2626)"
];
const dashIcons = ["⚡", "🔧", "📋", "📅", "📁", "👁️", "👤", "⚠️", "🏢", "⏱️"];
const q10metrics = [
  { m: "↓50%", u: "TRIR" }, { m: "90%+", u: "closure" }, { m: "↓65%", u: "prep" }, { m: "100%", u: "tracked" },
  { m: "24hr", u: "fresh" }, { m: "1×", u: "all sites" }, { m: "3-5×", u: "reports" }, { m: "✓", u: "CSRD" },
  { m: "0", u: "sheets" }
];

const IMG = {
  q1_mfg: "https://images.unsplash.com/photo-1649777689164-c4ad5dd3a83c?w=800&fit=crop&auto=format",
  q1_con: "https://images.unsplash.com/photo-1623489254637-a2dd8375243d?w=800&fit=crop&auto=format",
  q1_og: "https://images.unsplash.com/photo-1690508313456-bf8c851e8319?w=800&fit=crop&auto=format",
  q1_chem: "https://images.unsplash.com/photo-1579096262612-ae99731c2e46?w=800&fit=crop&auto=format",
  q1_ene: "https://images.unsplash.com/photo-1691927458684-8b30380b9412?w=800&fit=crop&auto=format",
  q1_log: "https://plus.unsplash.com/premium_photo-1661302828763-4ec9b91d9ce3?w=800&fit=crop&auto=format",
  q1_min: "https://images.unsplash.com/photo-1680463990599-9d318aaecf71?w=800&fit=crop&auto=format",
  q1_pha: "https://images.unsplash.com/photo-1669101283516-e608dcf142df?w=800&fit=crop&auto=format",
  q1_food: "https://plus.unsplash.com/premium_photo-1661962510909-4be27f3637a2?w=800&fit=crop&auto=format",
  q1_other: "https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=800&fit=crop&auto=format",
  q2: "https://plus.unsplash.com/premium_photo-1770505510998-dc0018824945?w=800&fit=crop&auto=format",
  q3: "https://images.unsplash.com/photo-1639987650487-e10b3ae94fe6?w=800&fit=crop&auto=format",
  q4: "https://plus.unsplash.com/premium_photo-1671461774955-7aab3ab41b90?w=800&fit=crop&auto=format",
  q5: "https://plus.unsplash.com/premium_photo-1681823422920-8bbe01d9235f?w=800&fit=crop&auto=format",
  q6: "https://images.unsplash.com/photo-1635859890085-ec8cb5466806?w=800&fit=crop&auto=format",
  q7: "https://images.unsplash.com/photo-1490724500206-cd5482e02b9e?w=800&fit=crop&auto=format",
  q8: "https://plus.unsplash.com/premium_photo-1683133377695-0bbe02473b96?w=800&fit=crop&auto=format",
  q9: "https://plus.unsplash.com/premium_photo-1661963882294-f1b2c7a8a710?w=800&fit=crop&auto=format",
  q10: "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=800&fit=crop&auto=format",
};

const questions = [
  {
    id: 1, phase: 1, pn: "IDENTITY", q: "Which industry best describes your operation?", type: "icon-grid", img: IMG.q1_mfg,
    opts: [
      { l: "Manufacturing",  icon: "🏭", pts: 3, img: IMG.q1_mfg,   hl: "396 manufacturing workers died on US job sites in 2023.",          bd: "Top causes: equipment contact (35%), falls (17%), harmful exposure (14%).", src: "BLS CFOI 2023" },
      { l: "Construction",   icon: "🏗️", pts: 4, img: IMG.q1_con,   hl: "Construction's Fatal Four kill 1 worker every 11 hours.",           bd: "59.2% of all construction deaths.",                                          src: "OSHA; BLS 2023" },
      { l: "Oil & Gas",      icon: "🛢️", pts: 5, img: IMG.q1_og,    hl: "15 dead. 180 injured. BP Texas City — audit findings never tracked.", bd: "Baker Panel: 'systemic' safety culture failure.",                           src: "CSB 2005-04-I-TX" },
      { l: "Chemicals",      icon: "⚗️", pts: 5, img: IMG.q1_chem,  hl: "$36M settlement. 3 days of fire over Houston.",                     bd: "ITC (2019) — inspection documentation gaps.",                               src: "CSB; EPA" },
      { l: "Energy",         icon: "⚡", pts: 4, img: IMG.q1_ene,   hl: "246 died. Same grid failure from 2011 — nobody tracked the fix.",   bd: "$195B damage.",                                                              src: "FERC/NERC 2021" },
      { l: "Logistics",      icon: "📦", pts: 3, img: IMG.q1_log,   hl: "Amazon's injury rate: 2× industry average.",                        bd: "6.9 serious injuries per 100 workers.",                                      src: "SOC 2023" },
      { l: "Mining",         icon: "⛏️", pts: 4, img: IMG.q1_min,   hl: "270 dead. Dam stability data was falsified.",                       bd: "Brumadinho (2019) — $7B+ in fines.",                                        src: "Reuters" },
      { l: "Pharma",         icon: "💊", pts: 3, img: IMG.q1_pha,   hl: "2 infants died. FDA: no contamination controls.",                   bd: "Abbott Sturgis (2022).",                                                     src: "FDA" },
      { l: "Food / FMCG",   icon: "🍽️", pts: 2, img: IMG.q1_food,  hl: "90+ FDA Warning Letters in 2023. #1: CAPA failure.",               bd: "Same failure — year after year.",                                            src: "FDA" },
      { l: "Other",          icon: "🏢", pts: 3, img: IMG.q1_other, hl: "Poor safety costs $3.2T/year — 3.94% of global GDP.",              bd: "2.93M work-related deaths annually.",                                        src: "ILO 2024" },
    ]
  },
  {
    id: 2, phase: 1, pn: "IDENTITY", q: "How many employees does your organization have?", type: "size-cards", img: IMG.q2,
    opts: [
      { l: "Under 100",    icon: "👤",  pts: 3, hl: "OSHA doesn't scale penalties. $161,323 willful — same for all.", bd: "One citation = months of budget.",                        src: "OSHA 2024" },
      { l: "100–500",      icon: "👥",  pts: 5, hl: "Enough complexity. Rarely enough EHS resources.",                bd: "SST program flags mid-size disproportionately.",          src: "OSHA CPL 02-00-155" },
      { l: "501–1,000",    icon: "🏢",  pts: 7, hl: "500+: incident under-reporting peaks.",                         bd: "Large enough for incidents, not centralized enough.",     src: "ILO 2015" },
      { l: "1,001–5,000",  icon: "🏗️", pts: 6, hl: "Gap between policy and execution = primary risk.",              bd: "Widest audit variance at this scale.",                    src: "BSI Group" },
      { l: "5,000+",       icon: "🌐",  pts: 4, hl: "Enterprise exposure. Penalties up 35% since 2020.",             bd: "CSRD adds ESG on top of EHS.",                            src: "EC 2022/2464" },
    ]
  },
  {
    id: 3, phase: 1, pn: "IDENTITY", q: "How much of your workforce operates through contractors?", type: "cards", img: IMG.q3,
    opts: [
      { l: "Very little",          pts: 2, hl: "OSHA holds host responsible — even for contractor hazards.", bd: "Multi-Employer Citation Policy.",                         src: "OSHA CPL 02-00-124" },
      { l: "Some presence",        pts: 4, hl: "Piper Alpha: 167 killed. PTW handover failure.",              bd: "Night shift didn't know pump was isolated.",               src: "Cullen Report 1990" },
      { l: "Significant",          pts: 6, hl: "First-year workers: 3× more lost-time injuries.",             bd: "Records at tender stale by mobilization.",                src: "CPWR 2018" },
      { l: "Core to operations",   pts: 8, hl: "6,500+ deaths. Qatar World Cup construction.",                bd: "Inconsistent safety across contractor orgs.",             src: "The Guardian 2021" },
    ]
  },
  {
    id: 4, phase: 2, pn: "DIAGNOSIS", q: "Primary way of managing EHS today?", type: "cards", img: IMG.q4,
    opts: [
      { l: "Excel / Google Sheets",  pts: 14, hl: "SIS proof test passes. Record disappears.",             bd: "No audit trail. No version control.",                      src: "OSHA PSM patterns" },
      { l: "Email / WhatsApp",       pts: 15, hl: "MOC approved via WhatsApp. Nobody saved it.",           bd: "CSB: inadequate MOC in 25%+ investigations.",             src: "CSB Key Lessons" },
      { l: "Paper-based forms",      pts: 16, hl: "OSHA cites for not proving — not not doing.",           bd: "Paper doesn't survive filing or turnover.",               src: "OSHA enforcement" },
      { l: "Generic workflow tool",  pts: 10, hl: "Tracks tasks. Can't enforce MOC or flag CAPA.",         bd: "Needs API RP 754, ISO 45001 logic.",                      src: "API RP 754" },
      { l: "Legacy EHS software",    pts:  8, hl: "Husky: vessel overdue. System said current.",           bd: "Legacy = false confidence.",                              src: "CSB 2018-02-I-WI" },
      { l: "No formal system",       pts: 18, hl: "2.93M die annually. Most without formal systems.",      bd: "Majority in SMEs without OHS.",                          src: "ILO 2024" },
    ]
  },
  {
    id: 5, phase: 2, pn: "DIAGNOSIS", q: "How are incidents and near-misses reported?", type: "cards", img: IMG.q5,
    opts: [
      { l: "Paper form to supervisor",   pts: 11, hl: "Pattern across sites? Visible in 6 months.",                   bd: "Time lag kills trend analysis.",                 src: "Industry" },
      { l: "WhatsApp / phone / verbal",  pts: 12, hl: "H₂S alarm at 3 AM. Shift book. Never in system.",             bd: "No trail. No classification.",                  src: "CSB" },
      { l: "Email to EHS team",          pts:  9, hl: "Database = someone's inbox. They leave, it leaves.",           bd: "Single point of failure.",                      src: "Industry" },
      { l: "Spreadsheet tracker",        pts:  8, hl: "'Closed' = typed 'closed.' CAPA unverified.",                  bd: "No workflow enforcement.",                      src: "Industry" },
      { l: "Formal digital workflow",    pts:  2, hl: "Top 15%. Captures leading indicators too?",                    bd: "Near-misses, not just recordables.",             src: "API RP 754" },
      { l: "Varies by site",             pts: 10, hl: "OSHA requests ALL site records. One inspection.",              bd: "Inconsistency triggers deeper review.",          src: "OSHA CPL 02-00-155" },
    ]
  },
  {
    id: 6, phase: 2, pn: "DIAGNOSIS", q: "How are permits and compliance deadlines tracked?", type: "cards", img: IMG.q6,
    opts: [
      { l: "Spreadsheets / calendar",  pts:  6, hl: "Calendar doesn't escalate or know who's on leave.", bd: "Fires once. No record.",                      src: "Industry" },
      { l: "Email follow-ups",         pts:  9, hl: "'Did you renew?' 'Which one?' 'From March.'",       bd: "No record. No accountability.",               src: "Industry" },
      { l: "External consultant",      pts:  7, hl: "General Duty Clause: YOU, not the consultant.",     bd: "Section 5(a)(1).",                            src: "OSHA Act 1970" },
      { l: "Inconsistent tracking",    pts: 10, hl: "Beirut: 12 comms. 6 agencies. 218 died.",           bd: "Everyone assumed someone else handled it.",   src: "HRW 2021" },
      { l: "Discover reactively",      pts: 12, hl: "$161,323 willful. 'Didn't know' ≠ defense.",        bd: "Violation exists before discovery.",           src: "OSHA 2024" },
      { l: "Formal system",            pts:  2, hl: "Ahead of 80%. Tracks evidence or just dates?",     bd: "Gap: due date vs. current evidence.",         src: "Industry" },
    ]
  },
  {
    id: 7, phase: 3, pn: "COST", q: "How long to prepare a reliable EHS report?", type: "calendar", img: IMG.q7,
    opts: [
      { l: "Same day",   sub: "TODAY",   pts:  1, hl: "Best-in-class: 3.2× more likely real-time data.", bd: "Near top tier — if system-driven.",       src: "Aberdeen 2018" },
      { l: "1–2 days",   sub: "24-48H",  pts:  4, hl: "Average injury: $44,000. Every lag day matters.", bd: "Acceptable non-PSM.",                     src: "NSC 2024" },
      { l: "3–5 days",   sub: "3-5 DAYS",pts:  7, hl: "Boeing: 4 bolts missing. Report took days. Flew.",bd: "Days-long cycles pass defects.",           src: "NTSB 2024" },
      { l: "1+ week",    sub: "7+ DAYS", pts:  9, hl: "OSHA: fatality in 8hrs. You're slower.",          bd: "29 CFR 1904.39.",                         src: "OSHA" },
      { l: "Depends",    sub: "???",     pts: 10, hl: "Safety pro tenure: 4.2yrs. Rebuilds each cycle.", bd: "Fails during leave, turnover.",            src: "BLS" },
    ]
  },
  {
    id: 8, phase: 3, pn: "COST", q: "Single biggest gap in your EHS setup?", type: "dashboard", img: IMG.q8,
    opts: [
      { l: "Delayed visibility",   pts: 13, hl: "Deepwater Horizon: signals hours before. Nobody watching.", bd: "11 dead. Visibility failure.",         src: "Nat. Commission 2011" },
      { l: "Weak CAPA",            pts: 10, hl: "BP: audit 3mo before. Never tracked. 15 died.",             bd: "CSB #1: documented, never closed.",    src: "Baker Panel; CSB" },
      { l: "Audit readiness",      pts:  9, hl: "Most cited PSM: evidence not locatable.",                    bd: "PHA, MI, Op Procedures.",             src: "OSHA 1910.119" },
      { l: "Compliance gaps",      pts: 12, hl: "Permit expired Tue. Found Thu.",                             bd: "Regulator first = willful.",           src: "OSHA 2024" },
      { l: "Scattered evidence",   pts: 11, hl: "Beirut: 12 flags. 6 years. 218 killed.",                    bd: "No system connected them.",            src: "HRW 2021" },
      { l: "No leadership view",   pts: 11, hl: "Credit Suisse: $5.5B. Bank gone.",                          bd: "Filtered data to leadership.",         src: "CS 2021" },
      { l: "People-dependent",     pts: 10, hl: "Samsung: cancer decade. 118+ died.",                        bd: "Leaves with turnover.",                src: "SHARPS; BBC" },
      { l: "Near-misses hidden",   pts: 12, hl: "1 major per 600 near-misses.",                              bd: "Invisible base.",                      src: "Bird 1985" },
      { l: "Inconsistent sites",   pts: 10, hl: "Rana Plaza: 1 left. 3 stayed. 1,134 died.",                 bd: "Policy ≠ practice.",                   src: "ILO" },
      { l: "Reporting slow",       pts:  8, hl: "Weekly = 7-day-old data.",                                  bd: "Historical, not decisions.",           src: "Industry" },
    ]
  },
  {
    id: 9, phase: 3, pn: "COST", q: "Hours for external audit preparation?", type: "clock", img: IMG.q9,
    opts: [
      { l: "20–50 hrs",   hrs:  35, pts:  3, hl: "Strong system or narrow scope.",      bd: "Reconstructed = auditor gaps.",         src: "Industry" },
      { l: "51–100 hrs",  hrs:  75, pts:  6, hl: "12.5 days. $3,900+ per cycle.",       bd: "Mostly evidence hunting.",              src: "BLS" },
      { l: "101–200 hrs", hrs: 150, pts:  9, hl: "More proving than achieving.",         bd: "Evidence across 5+ systems.",           src: "Industry" },
      { l: "200+ hrs",    hrs: 220, pts: 12, hl: "5 weeks. $7,800+ safety labor.",       bd: "Prep itself = the risk.",               src: "BLS" },
    ]
  },
  {
    id: 10, phase: 4, pn: "INTENT", q: "What would make a new EHS platform worth adopting? (Up to 3)", type: "multi-select", img: IMG.q10,
    opts: [
      { l: "Faster incident reporting", hl: "20–50% TRIR improvement.",  src: "Campbell Institute" },
      { l: "Better CAPA closure",       hl: "90%+ closure rates.",        src: "FDA 483" },
      { l: "Reliable audit readiness",  hl: "50–65% less prep.",          src: "BSI" },
      { l: "Stronger compliance",       hl: "50K+ under CSRD.",           src: "EC" },
      { l: "Leadership visibility",     hl: "1 dashboard replaces all.",  src: "Industry" },
      { l: "Standardized sites",        hl: "Same workflow everywhere.",  src: "Industry" },
      { l: "Mobile / field-first",      hl: "70% of EHS is in field.",    src: "Industry" },
      { l: "ESG readiness",             hl: "VW: $30B+. Real penalties.", src: "SEC" },
      { l: "No more spreadsheets",      hl: "Excel can't escalate.",      src: "Industry" },
    ]
  }
];

// Question-id → form field name map
const FIELD_MAP = {
  1: 'industry',
  2: 'employees',
  3: 'contractors',
  4: 'tool',
  5: 'reporting',
  6: 'deadline_tracking',
  7: 'report_time',
  8: 'risk_issue',
  9: 'external_audit_preparation',
  10: 'priority',
};

// ══════════════════════════════════════════════════════════════
//  STATE
// ══════════════════════════════════════════════════════════════
let state = {
  step: 0,
  answers: {},
  fact: null,
  multiSel: [],
  score: 0,
  aiInsight: "",
loadingAI: false,
  contact: { name: "", email: "", company: "", phone: "" },
  submitted: false,
  selected: null,
  animating: false
};

// ══════════════════════════════════════════════════════════════
//  HELPERS
// ══════════════════════════════════════════════════════════════
function bandInfo(s) {
  if (s <= 25) return { label: "Low Risk",      color: GREEN,    bg: "#E8F5E1", msg: "Your EHS framework is ahead of most. Fine-tune and automate." };
  if (s <= 50) return { label: "Moderate Risk", color: AMBER,    bg: "#FEF3E2", msg: "Gaps exist that could surface during your next audit or incident." };
  if (s <= 75) return { label: "High Risk",     color: "#E65100",bg: "#FBE9E7", msg: "Systemic EHS exposure. Structured action needed." };
  return             { label: "Critical Risk",  color: "#C62828",bg: "#FFEBEE", msg: "Significant operational and regulatory risk. Immediate attention required." };
}

function gaugeNarrative(step) {
  if (step < 3) return "Assessing your profile...";
  if (step < 6) return "Analyzing risk exposure...";
  if (step < 9) return "Calculating impact...";
  return "Assessment complete";
}

function calcScore(answers) {
  let t = 0;
  Object.entries(answers).forEach(([id, v]) => {
    const qd = questions.find(x => x.id === +id);
    if (!qd) return;
    if (qd.type === "multi-select") {
      const c = Array.isArray(v) ? v.length : 0;
      t += c >= 3 ? 3 : c >= 2 ? 1 : 0;
    } else {
      const o = qd.opts.find(x => x.l === v);
      if (o) t += o.pts;
    }
  });
  return t;
}

function svgClock(hours, size) {
  const ha = ((hours % 12) / 12) * 360;
  let ticks = "";
  for (let i = 0; i < 12; i++) {
    const len = i % 3 === 0 ? 4 : 2;
    const sw  = i % 3 === 0 ? 1.5 : 0.5;
    ticks += `<line x1="30" y1="7" x2="30" y2="${7 + len}" stroke="${NAVY}" stroke-width="${sw}" transform="rotate(${i * 30} 30 30)"/>`;
  }
  return `<svg width="${size}" height="${size}" viewBox="0 0 60 60">
    <circle cx="30" cy="30" r="26" fill="none" stroke="${NAVY}" stroke-width="2"/>
    ${ticks}
    <line x1="30" y1="30" x2="30" y2="14" stroke="${NAVY}" stroke-width="2.5" stroke-linecap="round" transform="rotate(${ha} 30 30)"/>
    <circle cx="30" cy="30" r="2.5" fill="${NAVY}"/>
  </svg>`;
}

function esc(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}

// ══════════════════════════════════════════════════════════════
//  HIDDEN INPUT SYNC
//  Keeps a hidden <input name="..."> inside #diag-form for
//  every answered question so a native form.submit() works.
// ══════════════════════════════════════════════════════════════
function syncHiddenInputs() {
  // Remove previously injected EHS inputs (leave _token alone)
  document.querySelectorAll('#diag-form input[data-ehs]').forEach(el => el.remove());

  const form = document.getElementById('diag-form');
  if (!form) return;

  Object.entries(state.answers).forEach(([id, val]) => {
    const fieldName = FIELD_MAP[+id];
    if (!fieldName) return;

    if (Array.isArray(val)) {
      // e.g. priority[]
      val.forEach(v => {
        const inp = document.createElement('input');
        inp.type      = 'hidden';
        inp.name      = fieldName + '[]';
        inp.value     = v;
        inp.dataset.ehs = '1';
        form.appendChild(inp);
      });
    } else {
      const inp = document.createElement('input');
      inp.type      = 'hidden';
      inp.name      = fieldName;
      inp.value     = val;
      inp.dataset.ehs = '1';
      form.appendChild(inp);
    }
  });
  [
  ['ai_summary', state.aiInsight],
  ['risk_score', state.score],
  ['ehs_readiness_score', 100 - state.score],
  ['assessment_answers', JSON.stringify(state.answers)]
].forEach(([name, value]) => {

  const inp = document.createElement('input');

  inp.type = 'hidden';

  inp.name = name;

  inp.value = value;

  inp.dataset.ehs = '1';

  form.appendChild(inp);

});
}

// ══════════════════════════════════════════════════════════════
//  RENDER
// ══════════════════════════════════════════════════════════════
function render() {
  const app = document.getElementById('app');

  // Results step
  if (state.step === 10) {
    app.innerHTML = renderResults();
    attachResultsEvents();
    return;
  }

  const q      = questions[state.step];
  const pc     = phaseClr[q.phase];
  const pct    = Math.min(Math.round(state.score), 100);
  const band   = bandInfo(pct);
  const circum = 251.2;
  const offset = circum - (circum * pct / 100);
  const narr   = state.score > 0 && state.step >= 6 ? band.label : gaugeNarrative(state.step);

  const factImg     = state.fact && state.fact.img ? state.fact.img : q.img;
  const factOverlay = `linear-gradient(to bottom,rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.85) 55%),url(${factImg})`;
  const factContent = state.fact
    ? `<div class="fact-tag">💡 REAL INCIDENT</div>
       <div class="fact-hl">${state.fact.hl}</div>
       <div class="fact-bd">${state.fact.bd || ''}</div>
       <div class="fact-src">Source: ${state.fact.src}</div>`
    : `<div class="fact-tag">💡 DID YOU KNOW</div>
       <div class="fact-hl">Every year, 2.93 million workers die from work-related causes globally.</div>
       <div class="fact-bd" style="color:rgba(255,255,255,0.7)">Select an option to see a real incident.</div>`;

  app.innerHTML = `
    <div id="app-inner" style="max-width:920px;margin:0 auto;padding:16px 16px 24px;">
      <div class="header">

        <div class="q-counter">Q${state.step + 1}/10</div>
      </div>
      <div class="progress-bar">
        <div class="progress-fill" style="width:${((state.step + 1) / 10) * 100}%;background:${pc};"></div>
      </div>
      <div class="phase-label" style="color:${pc};">PHASE ${q.phase} — ${q.pn}</div>

      <div class="cols slide-in" id="main-cols">

        <!-- LEFT: question + options -->
        <div class="col-right">
          <div class="q-title">${q.q}</div>
          <div id="options-container">
            ${renderOptions(q)}
          </div>
          ${state.step > 0 && q.type !== 'multi-select' && !state.selected
            ? `<button class="back-btn" id="back-btn" type="button">← Back</button>`
            : ''}
        </div>
        <!-- right: gauge + fact card -->
        <div class="col-left">
          <div class="gauge-card">
            <div class="gauge-wrap">
              <svg viewBox="0 0 100 100" width="80" height="80" style="transform:rotate(-90deg)">
                <circle cx="50" cy="50" r="40" fill="none" stroke="#E5E7EB" stroke-width="6"/>
                <circle class="gauge-circle" cx="50" cy="50" r="40" fill="none"
                  stroke="${band.color}" stroke-width="6"
                  stroke-dasharray="${circum}" stroke-dashoffset="${offset}"
                  stroke-linecap="round"/>
              </svg>
              <div class="gauge-inner">
                <div class="gauge-score" style="color:${band.color}">${pct}</div>
                <div class="gauge-denom">/ 100</div>
              </div>
            </div>
            <div class="gauge-narr" style="color:${band.color}">${narr}</div>
          </div>
          <div class="fact-card" style="background-image:${factOverlay};background-color:#0D2B4E;">
            <div class="fact-inner">${factContent}</div>
          </div>
        </div>
      </div>
    </div>`;

  attachEvents(q);
}

// ── Option HTML builders ───────────────────────────────────────
function renderOptions(q) {
  if (q.type === "icon-grid") {
    return `<div class="opt-icon-grid">
      ${q.opts.map(o => `
        <button class="opt-icon-btn${state.selected === o.l ? ' selected-opt' : ''}"
          data-label="${esc(o.l)}" data-type="icon-grid">
          <div class="icon">${o.icon}</div>
          <div class="lbl">${esc(o.l)}${state.selected === o.l ? '<span class="check-mark">✓</span>' : ''}</div>
        </button>`).join('')}
    </div>`;
  }

  if (q.type === "size-cards") {
    return `<div class="opt-size-list">
      ${q.opts.map(o => `
        <button class="opt-size-btn${state.selected === o.l ? ' selected-opt' : ''}"
          data-label="${esc(o.l)}" data-type="size-cards">
          <div class="icon">${o.icon}</div>
          <div>
            <div class="lbl">${esc(o.l)}${state.selected === o.l ? '<span class="check-mark">✓</span>' : ''}</div>
            <div class="sub">employees</div>
          </div>
        </button>`).join('')}
    </div>`;
  }

  if (q.type === "calendar") {
    return `<div class="opt-cal-grid">
      ${q.opts.map(o => `
        <button class="opt-cal-btn${state.selected === o.l ? ' selected-opt' : ''}"
          data-label="${esc(o.l)}" data-type="calendar">
          <div class="opt-cal-top${state.selected === o.l ? ' cal-sel-top' : ''}">${o.sub}</div>
          <div class="opt-cal-bot">${esc(o.l)}${state.selected === o.l ? '<span class="check-mark">✓</span>' : ''}</div>
        </button>`).join('')}
    </div>`;
  }

  if (q.type === "dashboard") {
    return `<div class="opt-dash-grid">
      ${q.opts.map((o, i) => `
        <button class="opt-dash-btn${state.selected === o.l ? ' dash-selected' : ''}  dash-card"
          style="${state.selected === o.l ? '' : `background:${dashGrads[i]};border:none;`}"
          
          data-label="${esc(o.l)}" data-type="dashboard">
          <div class="icon">${state.selected === o.l ? '✓' : dashIcons[i]}</div>
          <div class="lbl">${esc(o.l)}</div>
        </button>`).join('')}
    </div>`;
  }

  if (q.type === "clock") {
    return `<div class="opt-clock-grid">
      ${q.opts.map(o => `
        <button class="opt-clock-btn${state.selected === o.l ? ' selected-opt' : ''}"
          data-label="${esc(o.l)}" data-type="clock">
          ${svgClock((o.hrs || 50) / 10, 52)}
          <div class="lbl">${esc(o.l)}${state.selected === o.l ? '<span class="check-mark">✓</span>' : ''}</div>
        </button>`).join('')}
    </div>`;
  }

  if (q.type === "multi-select") {
    const btns = q.opts.map((o, i) => {
      const sel = state.multiSel.find(m => m.l === o.l);
      const met = q10metrics[i] || { m: "✓", u: "" };
      return `<button class="opt-multi-btn${sel ? ' multi-selected' : ''}"
        data-label="${esc(o.l)}" data-type="multi-select">
        ${sel
          ? `<div class="metric" style="color:${GREEN}">${met.m}</div>
             <div class="unit"   style="color:${GREEN}">${met.u}</div>
             <div class="check">✓ ${esc(o.l)}</div>`
          : `<div class="lbl">${esc(o.l)}</div>`}
      </button>`;
    });
    return `<div class="opt-multi-grid">${btns.join('')}</div>
      <div class="multi-count">${state.multiSel.length}/3 selected</div>
      <button class="btn-primary" id="multi-submit"
        style="background:${state.multiSel.length ? GREEN : '#E5E7EB'};color:#fff;border:none;"
        ${state.multiSel.length ? '' : 'disabled'}>See My Results →</button>`;
  }

  // Default card list
  return `<div class="opt-card-list">
    ${q.opts.map(o => `
      <button class="opt-card-btn${state.selected === o.l ? ' selected-opt' : ''}"
        data-label="${esc(o.l)}" data-type="cards">
        <span>${esc(o.l)}</span>
        ${state.selected === o.l ? '<span class="check-mark">✓</span>' : ''}
      </button>`).join('')}
  </div>`;
}

// ── Results page ───────────────────────────────────────────────
function renderResults() {
  const pct      = Math.min(Math.round(state.score), 100);
  const band     = bandInfo(pct);
  const phaseIdx = pct > 50 ? 3 : pct > 25 ? 2 : 4;
  const circum   = 251.2;
  const offset   = circum - (circum * pct / 100);

  return `
  <div class="results-wrap">
    <div class="results-header">
      
      <div class="results-title">Your EHS Assessment Results</div>
    </div>
    <div class="results-cols">

      <!-- Score card -->
      <div class="res-left">
        <div class="res-score-panel" style="background:${phaseGrad[phaseIdx]}">
          <div style="
            display:flex;
            align-items:center;
            justify-content:center;
            gap:55px;
          ">

            <!-- LEFT : Gauge -->
            <div class="gauge-wrap" style="margin:0">
              <svg viewBox="0 0 100 100" width="82" height="82" style="transform:rotate(-90deg)">
                <circle cx="50" cy="50" r="40" fill="none"
                  stroke="rgba(255,255,255,0.15)"
                  stroke-width="6"/>

                <circle cx="50" cy="50" r="40" fill="none"
                  stroke="${W}"
                  stroke-width="6"
                  stroke-dasharray="${circum}"
                  stroke-dashoffset="${offset}"
                  stroke-linecap="round"
                  style="transition:all 1s ease"/>
              </svg>

              <div class="gauge-inner">
                <div class="gauge-score" style="
                  color:#fff;
                  font-size:24px;
                ">
                  ${pct}
                </div>

                <div class="gauge-denom" style="
                  color:rgba(255,255,255,0.6)
                ">
                  /100
                </div>
                
              </div>
              <div class="res-readiness-label" style="
                margin-top:0;
                margin-bottom:10px;
                font-size:11px;
                letter-spacing:2px;
              ">
                Risk Score
              </div>
            </div>

            <!-- RIGHT : Readiness -->
            <div style="text-align:left">

              <div class="res-readiness-label" style="
                margin-top:0;
                margin-bottom:6px;
                font-size:11px;
                letter-spacing:2px;
              ">
                EHS READINESS
              </div>

              <div class="res-score-big" style="
                margin:0;
                font-size:38px;
                line-height:1;
              ">
                ${100 - pct}<span style="font-size:16px">/100</span>
              </div>

            </div>

          </div>
        </div>
        <div class="res-body">
          <div style="
            padding:18px;
            border-radius:14px;
            background:#F7F9FC;
            border:1px solid #E5E7EB;
          ">

            <div style="
              font-size:14px;
              line-height:1.9;
              color:#444;
              white-space:pre-line;
            ">
              ${state.aiInsight}
            </div>

          </div>
          ${state.submitted ? `
          <div class="success-box">
            <div class="success-title">✓ Assessment Submitted</div>
            <div class="success-msg">Your AI-generated preliminary insights and detailed gap analysis will be delivered within 48 hours.</div>
            <div class="success-links">
              <a href="https://linkedin.com/company/soapboxcloud" target="_blank" rel="noreferrer">LinkedIn ↗</a>
              <a href="https://instagram.com/soapbox.cloud" target="_blank" rel="noreferrer">Instagram ↗</a>
            </div>
          </div>` : ''}
        </div>
      </div>

      <!-- Contact form -->
      <div class="res-right">
        <div class="unlock-title">Unlock Your Report</div>
        <div class="unlock-desc">Get your site-specific gap analysis with recommended corrective actions, compliance timeline, and estimated risk reduction — based on your answers.</div>
        <div class="fw-semibold mb-3">If you would like the full operational report based on this assessment, fill in your details and our team will get back to you within 2 working days.</div>

        <div class="form-field">
          <label class="form-label">Name</label>
          <input type="text" id="c-name" name="name"
            placeholder="Full name"
            value="${esc(state.contact.name)}" />
        </div>
        <div class="form-field">
          <label class="form-label">Email</label>
          <input type="email" id="c-email" name="email"
            placeholder="work@company.com"
            value="${esc(state.contact.email)}" />
        </div>
        <div class="form-field">
          <label class="form-label">Company</label>
          <input type="text" id="c-company" name="company"
            placeholder="Company name"
            value="${esc(state.contact.company)}" />
        </div>
        <div class="form-field">
          <label class="form-label">Phone (optional)</label>
          <input type="text" id="c-phone" name="phone"
            placeholder="+91..."
            value="${esc(state.contact.phone)}" />
        </div>

        <button class="btn-submit" id="submit-btn" type="submit"
          ${state.submitted || !state.contact.name || !state.contact.email ? 'disabled' : ''}>
          ${state.submitted ? '✓ Submitted' : 'Get My Report →'}
        </button>
        <div class="form-note">Built by 20+ years of team experience in regulated industries</div>
      </div>
    </div>
  </div>`;
}

function renderLoadingScreen() {

  const app = document.getElementById('app');

  app.innerHTML = `
    <div style="
      min-height:450px;
      display:flex;
      align-items:center;
      justify-content:center;
      flex-direction:column;
      text-align:center;
      padding:40px;
    ">

      <div style="
        width:60px;
        height:60px;
        border:4px solid #E5E7EB;
        border-top:4px solid #1E63AC;
        border-radius:50%;
        animation:spin 1s linear infinite;
        margin-bottom:24px;
      "></div>

      <div style="
        font-size:24px;
        font-weight:800;
        color:#0D2B4E;
        margin-bottom:12px;
      ">
        Analyzing Your EHS Environment
      </div>

      <div style="
        max-width:550px;
        font-size:15px;
        line-height:1.8;
        color:#666;
      ">
        Our AI is evaluating operational exposure, compliance coordination,
        audit readiness, reporting maturity, and systemic risk indicators
        across your organization.
      </div>

    </div>

    <style>
      @keyframes spin {
        100% {
          transform: rotate(360deg);
        }
      }
    </style>
  `;
}

// ══════════════════════════════════════════════════════════════
//  EVENT BINDING
// ══════════════════════════════════════════════════════════════
function attachEvents(q) {
  // Single-select option buttons
  document.querySelectorAll('[data-type]:not([data-type="multi-select"])').forEach(btn => {
    btn.addEventListener('click', () => handleSelect(btn.dataset.label, q));
    btn.addEventListener('mouseenter', () => {
      if (state.selected) return;
      const opt = q.opts.find(o => o.l === btn.dataset.label);
      if (opt) { state.fact = opt; updateFact(opt, q); }
    });
  });

  // Multi-select option buttons
  document.querySelectorAll('[data-type="multi-select"]').forEach(btn => {
    btn.addEventListener('click', () => handleMultiToggle(btn.dataset.label, q));
    btn.addEventListener('mouseenter', () => {
      const opt = q.opts.find(o => o.l === btn.dataset.label);
      if (opt) { state.fact = opt; updateFact(opt, q); }
    });
  });

  // Multi-select submit
  const ms = document.getElementById('multi-submit');
  if (ms) ms.addEventListener('click', submitMulti);

  // Back button
  const bb = document.getElementById('back-btn');
  if (bb) bb.addEventListener('click', goBack);
}

function attachResultsEvents() {
  // Live-sync contact fields into state and re-evaluate submit button
  ['name', 'email', 'company', 'phone'].forEach(f => {
    const el = document.getElementById(`c-${f}`);
    if (!el) return;
    el.addEventListener('input', e => {
      state.contact[f] = e.target.value;
      const btn = document.getElementById('submit-btn');
      if (btn) btn.disabled = state.submitted || !state.contact.name || !state.contact.email;
    });
  });

  const btn = document.getElementById('submit-btn');
  if (btn) btn.addEventListener('click', submitContact);
}

// ══════════════════════════════════════════════════════════════
//  ACTIONS
// ══════════════════════════════════════════════════════════════
function handleSelect(label, q) {
  if (state.selected || state.animating) return;
  const opt = q.opts.find(o => o.l === label);
  if (!opt) return;

  state.selected  = label;
  state.fact      = opt;
  state.animating = true;

  // Show checkmark immediately
  const container = document.getElementById('options-container');
  if (container) container.innerHTML = renderOptions(q);
  updateFact(opt, q);

  // Pause → slide out → advance
  setTimeout(() => {
    const cols = document.getElementById('main-cols');
    if (cols) cols.classList.replace('slide-in', 'slide-out');

    setTimeout(() => {
      const na        = { ...state.answers, [q.id]: opt.l };
      state.answers   = na;
      state.score     = calcScore(na);
      syncHiddenInputs();   // ← write hidden inputs after each answer
      state.step++;
      state.selected  = null;
      state.fact      = null;
      state.animating = false;
      render();
    }, 350);
  }, 600);
}

function handleMultiToggle(label, q) {
  const opt = q.opts.find(o => o.l === label);
  if (!opt) return;

  const already = state.multiSel.find(m => m.l === opt.l);
  if (already) {
    state.multiSel = state.multiSel.filter(m => m.l !== opt.l);
  } else {
    if (state.multiSel.length >= 3) return;
    state.multiSel.push(opt);
  }

  state.fact = opt;
  const container = document.getElementById('options-container');
  if (container) { container.innerHTML = renderOptions(q); attachMultiEvents(q); }
  updateFact(opt, q);
}

function attachMultiEvents(q) {
  document.querySelectorAll('[data-type="multi-select"]').forEach(btn => {
    btn.addEventListener('click', () => handleMultiToggle(btn.dataset.label, q));
  });
  const ms = document.getElementById('multi-submit');
  if (ms) ms.addEventListener('click', submitMulti);
}

async function submitMulti() {

  if (!state.multiSel.length) return;

  const q = questions[state.step];

  const na = {
    ...state.answers,
    [q.id]: state.multiSel.map(m => m.l)
  };

  state.answers = na;
  state.score = calcScore(na);

  syncHiddenInputs();

  state.loadingAI = true;

  renderLoadingScreen();

  try {

    const response = await fetch('/api/generate-ehs-ai-insight', {

      method: 'POST',

      headers: {
        'Content-Type': 'application/json'
      },

      body: JSON.stringify({
        answers: state.answers,
        score: state.score
      })
    });

    const data = await response.json();

    state.aiInsight = data.insight || '';
    syncHiddenInputs();

  } catch (error) {

    console.error(error);

    state.aiInsight =
      "Your assessment indicates operational gaps in reporting visibility, compliance coordination, and corrective action tracking. Current workflows appear heavily dependent on fragmented systems and manual escalation processes, increasing audit exposure and slowing leadership visibility across operations.";

  }

  state.loadingAI = false;

  state.step = 10;

  state.multiSel = [];

  render();
}

function submitContact() {
  if (!state.contact.name || !state.contact.email) return;

  // Push latest contact values into their named inputs (they are already in DOM
  // because renderResults() built them with name="..." attributes)
  ['name', 'email', 'company', 'phone'].forEach(f => {
    const el = document.getElementById(`c-${f}`);
    if (el) el.value = state.contact[f];
  });

  state.submitted = true;

  // Native form submit — picks up _token, all hidden EHS inputs, and the
  // contact inputs (name="name", name="email", etc.) automatically
  const form = document.getElementById('diag-form');
  if (form) form.submit();
}

function goBack() {
  if (state.step > 0 && !state.selected && !state.animating) {
    const cols = document.getElementById('main-cols');
    if (cols) cols.classList.replace('slide-in', 'slide-out');
    setTimeout(() => {
      state.step--;
      state.fact = null;
      render();
    }, 300);
  }
}

function updateFact(opt, q) {
  const factImg = opt.img || q.img;
  const fc = document.querySelector('.fact-card');
  const fi = document.querySelector('.fact-inner');
  if (!fc || !fi) return;
  fc.style.backgroundImage = `linear-gradient(to bottom,rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.85) 55%),url(${factImg})`;
  fi.innerHTML = `
    <div class="fact-tag">💡 REAL INCIDENT</div>
    <div class="fact-hl">${opt.hl}</div>
    <div class="fact-bd">${opt.bd || ''}</div>
    <div class="fact-src">Source: ${opt.src}</div>`;
}

// ══════════════════════════════════════════════════════════════
//  BOOT
// ══════════════════════════════════════════════════════════════
render();
</script>
@endsection
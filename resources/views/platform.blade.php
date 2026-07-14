@extends('layouts.frontend')

@section('content')

<section class="hero platform-hero">

    <div class="container" data-aos="zoom-in">

        <div class="row">

            <div class="col-lg-9 col-xl-8">

                <div class="hero-livebadge mx-auto mb-4">

                    EHS SOFTWARE PLATFORM
                </div>

                <h1 class="hero-title text-white">
                    The EHS platform built for  
                    <br>
                    how operations actually
                    <br>
                    <span class="text-green">work.</span>
                </h1>

                <p class="industry-main-desc text-white">
                    One system. Every incident, every action, every permit, every audit finding — connected, controlled, and intelligent.
                </p>

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

<!-- <section>
    <div class="container py-3" data-aos="fade-up">
        <div class="text-center tag my-2">
            THE EHS EVOLUTION
        </div>

        <h2 class="text-gradient-blue text-center mb-4 fw-800">
            Where does your operation sit?
        </h2>

        <div class="row justify-content-center align-items-end g-4 mt-5">

            <div class="col-lg-2 col-md-6">
                <div class="evolution-card evolution-card-1">
                    <span class="step-label">STEP 01</span>

                    <h4>Excel</h4>

                    <p>
                        Tracks the problem. No audit trail.
                        No escalation. No enforcement.
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="evolution-card evolution-card-2">
                    <span class="step-label">STEP 02</span>

                    <h4>Basic Tools</h4>

                    <p>
                        Digitises the problem. Email,
                        WhatsApp, checklists. 
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="evolution-card evolution-card-3">
                    <span class="step-label">STEP 03</span>

                    <h4>Enterprise Suites</h4>

                    <p>
                        Controls the problem with long
                        rollouts, high costs and consultant
                        dependency.
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="evolution-card evolution-card-4 bg-gradient-customeblue">
                    <span class="step-label">STEP 04</span>

                    <h4>SOAPBOX.CLOUD™</h4>

                    <p>
                        Connects. Controls. Automates.
                        Intelligently improves the entire
                        EHS operating lifecycle.
                    </p>
                </div>
            </div>

        </div>

        <div class="text-center mt-5 evolution-footer">
            Most mid-market operations manage EHS with spreadsheets or disconnected tools.
            <br>
            SOAPBOX.CLOUD™ is the EHS management system that replaces fragmentation with one
            connected, intelligent platform.
        </div>
    </div>
</section> -->

<section>
    <div class="container py-5 " data-aos="fade-up">
        <div class="row">
            <div class="col-md-6">
                <div class="tag my-2">
                    ROLE-BASED TRANSPARENCY
                </div>
                <h2 class="section-title text-gradient-blue mb-4 fw-800">
                    Same platform.
                    <br>Three views.
                    <br>Total clarity.
                </h2>
                <p class="section-desc">
                    The board sees enterprise risk. 
                    The HSE manager sees site-level gaps. The field worker sees their tasks. One EHS software dashboard — three realities.
                </p>
            </div>
            <div class="col-md-6">

                <div class="d-flex justify-content-center align-items-center gap-3 h-100">

                    <div class="role-card board-card">
                        <div class="card-title">BOARD</div>

                        <div class="bar blue"></div>
                        <div class="bar orange"></div>

                        <div class="line w80"></div>
                        <div class="line w55"></div>
                    </div>

                    <div class="role-card manager-card">
                        <div class="card-title">HSE MANAGER</div>

                        <div class="bar blue"></div>
                        <div class="bar red"></div>

                        <div class="line w90"></div>
                        <div class="line w65"></div>
                        <div class="line w40"></div>
                    </div>

                    <div class="role-card worker-card">
                        <div class="card-title">FIELD WORKER</div>

                        <div class="bar green"></div>

                        <div class="line w75"></div>
                        <div class="line w45"></div>
                    </div>

                </div>
            
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-customeblue py-5">
    <div class="container" data-aos="zoom-out">
        <div class="row g-5">
            <div class="col-md-6 order-2 order-md-1">
                <div class="platform-live-image-card">
                    <img
                        src="{{ asset('images/platformimg2.webp') }}"
                        alt="Real Time EHS Management"
                        class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <div class="common-label mb-2">
                    REAL-TIME EHS MANAGEMENT SYSTEM
                </div>
                <h2 class="section-title text-white mb-4 fw-800">
                    No stale reports.<br>
                    No piled-up files.<br>
                    Live.
                </h2>

                <p class="section-desc fs-16 fw-light text-white">
Every incident, CAPA, permit renewal, and inspection result updates the picture in real time. Leadership sees today's risk — not last week's summary.
                </p>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container py-5" data-aos="zoom-in">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="tag mb-2">
                    SAFETY MANAGEMENT SOFTWARE
                </div>
                <h2 class="section-title text-gradient-blue mb-4 fw-800">
                    From reactive <br>
                    to predictive.
                </h2>
                <p class="section-desc fs-16 fw-light">
                    Pattern detection across incidents. Recurring CAPA failures flagged before they repeat.
                    Risk scores that update automatically as conditions change.         
                </p>   
            </div>
            <div class="col-md-6">
                <div class="platform-live-image-card bg-seventh">
                    <img
                        src="{{ asset('images/platformimg1.webp') }}"
                        alt="Real Time EHS Management"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-customeblue">
    <div class="container py-5" data-aos="zoom-out">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1">
                <div class="compliance-status-list mx-5">
                    <div class="status-item">
                        <span>ISO 45001</span>
                        <span class="status-success">✓ Current</span>
                    </div>

                    <div class="status-item">
                        <span>OSHA PSM</span>
                        <span class="status-success">✓ Current</span>
                    </div>

                    <div class="status-item">
                        <span>PTW Renewal</span>
                        <span class="status-warning">⏳ 7 days</span>
                    </div>

                    <div class="status-item">
                        <span>Fire Cert</span>
                        <span class="status-danger">⚠ Overdue</span>
                    </div>

                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <div class="common-label mb-2">
                    COMPLIANCE MANAGEMENT SOFTWARE
                </div>
                <h2 class="section-title text-white mb-4 fw-800">
                    Reduce risk with real-time compliance visibility.
                </h2>
                <p class="section-desc fs-16 fw-light text-white">
                    Every obligation. Every deadline. Every piece of evidence — collected as work happens.
                    Automatic alerts at 90, 60, 30, 7 days. Gaps flagged before the regulator finds them. 
               </p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-6">
                <div class="tag mb-2">
                    CONTRACTOR SAFETY MANAGEMENT
                </div>
                <h2 class="section-title text-gradient-blue mb-4 fw-800">
                    Empower contractors. Simplify onboarding.
                </h2>
                <p class="section-desc fs-16 fw-light">
                    Every contractor reports through the same workflow, with the same evidence standard, under the same escalation rules.
                    Contractor-specific dashboards with scoped access.
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center my-5">
                <div class="contractor-flow">
                    <div class="flow-card">
                        <div class="flow-icon">👷</div>
                        <div class="flow-title">Onboard</div>
                    </div>

                    <div class="flow-arrow">→</div>

                    <div class="flow-card">
                        <div class="flow-icon">📋</div>
                        <div class="flow-title">Report</div>
                    </div>

                    <div class="flow-arrow">→</div>

                    <div class="flow-card">
                        <div class="flow-icon">📊</div>
                        <div class="flow-title">Track</div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-customeblue">
    <div class="container py-5" data-aos="zoom-out" data-aos-delay="100">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1">
                <div class="capa-workflow">
                    <div class="capa-step success">
                        <div class="step-number">Step 1</div>
                        <div class="step-text">
                            Submitted with evidence ✓
                        </div>
                    </div>

                    <div class="capa-step success">
                        <div class="step-number">Step 2</div>
                        <div class="step-text">
                            Supervisor approved ✓
                        </div>
                    </div>

                    <div class="capa-step review">
                        <div class="step-number">Step 3</div>
                        <div class="step-text">
                            EHS Manager reviewing...
                        </div>
                    </div>

                    <div class="capa-step pending">
                        <div class="step-number">Step 4</div>
                        <div class="step-text">
                            Verified closure
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <div class="common-label mb-2">
                    CAPA MANAGEMENT SOFTWARE
                </div>
                <h2 class="section-title text-white mb-4 fw-800">
                    Review faster.
                    <br>Approve smarter.
                    <br>Protect everyone.
                </h2>
                <p class="section-desc fs-16 fw-light text-white">
                    Every corrective action assigned, tracked, and escalated in one system. 
                    No more lost CAPA files, missed deadlines, or ineffective actions.
                    </p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5 max-w-1000" data-aos="zoom-in" data-aos-delay="200">
        <h2 class="section-title text-gradient-blue mb-4 fw-800 text-center">
            The shift.
        </h2>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">

                <div class="shift-card">

                    <!-- WITHOUT -->
                    <div class="shift-panel shift-panel-left">

                        <div class="shift-heading shift-heading-danger">
                            WITH EXCEL
                        </div>

                        <div class="shift-row">
                            <span>Incident reporting</span>
                            <strong class="danger">3 days</strong>
                        </div>

                        <div class="shift-row">
                            <span>CAPA closure</span>
                            <strong class="danger">55%</strong>
                        </div>

                        <div class="shift-row">
                            <span>Audit prep</span>
                            <strong class="danger">40+ hrs</strong>
                        </div>

                        <div class="shift-row">
                            <span>Repeat incidents</span>
                            <strong class="danger">Rising</strong>
                        </div>

                        <div class="shift-row border-0">
                            <span>Leadership view</span>
                            <strong class="danger">Last month</strong>
                        </div>

                    </div>

                    <!-- WITH -->
                    <div class="shift-panel shift-panel-right">

                        <div class="shift-heading shift-heading-success">
                            WITH SOAPBOX.CLOUD™
                        </div>

                        <div class="shift-row">
                            <span>Incident reporting</span>
                            <strong class="success">30 sec</strong>
                        </div>

                        <div class="shift-row">
                            <span>CAPA closure</span>
                            <strong class="success">94%+</strong>
                        </div>

                        <div class="shift-row">
                            <span>Audit prep</span>
                            <strong class="success">5 min</strong>
                        </div>

                        <div class="shift-row">
                            <span>Repeat incidents</span>
                            <strong class="success">↓ 40%</strong>
                        </div>

                        <div class="shift-row border-0">
                            <span>Leadership view</span>
                            <strong class="success">Right now</strong>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

 <section class="closer">
        <div class="compliance-bottom-cta">
            <h3>
                Before we show you the product, <br> let's understand your operation.
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
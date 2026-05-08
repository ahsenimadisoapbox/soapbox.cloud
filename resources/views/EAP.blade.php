@extends('layouts.frontend')
@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'Early Adopters Program for Soapbox Cloud | Join Now',
    'description' => $meta->meta_description ?? 'Get first access to Soapbox enterprise cloud platform for compliance, safety, quality, and governance. Join the Early Adopters Program.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
@section('content')
<link href="{{asset('css/newstyle.css')}}" rel="stylesheet"/>
<section class="hero m-1000 d-flex align-items-center min-h-500"  data-aos="zoom-in">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8">
                
                <!-- Top Badge -->
                <div class="hero-badge mx-auto mb-4">
                    <span class="dot"></span>
                    Early Adopters Program — Now Open
                </div>
                <!-- Heading -->
                <h1 class="hero-title mb-4">
                EHS built for how <br>
                operations <span class="hero-highlight">actually work</span>
                </h1>
                <!-- Subtext -->
                <h3 class="hero-subtitle mx-auto mb-5 fw-normal">
                    Not a spreadsheet. Not a bloated enterprise suite. A better middle
                    path — structured enough for compliance, practical enough for the
                    field.
                </h3>
                <!-- Buttons -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="how-it-works" class="btn btn-custome text-white" id="scrollToDiagnostic">
                        Run your self-diagnosis
                        <span class="ms-2">&rarr;</span>
                    </a>
                    <a href="how-it-works" class="btn hero-btn-secondary" id="scrollToHowItWorks">
                        See how it works
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="problem-section" data-aos="fade-up">
    <div class="container max-w-1000 custom-container ">
        <!-- Divider -->
        <!-- Heading -->
        <div class="row">
            <div class="col-lg-11 col-xl-10">
                <p class="common-label">WHERE EHS BREAKS DOWN</p>
                <h2 class="common-title">
                When EHS Lives in Silos
                </h2>
                <h3 class="common-text">
                    EHS spread across spreadsheets, inboxes, and site-level habits forces teams to rely on memory, follow-ups, and manual reconciliation.
                </h3>
            </div>
        </div>
        <!-- Cards -->
        <div class="row g-4 problem-cards-row mt-0">
            <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                <div class="problem-card h-100">
                    <div class="problem-icon-box">
                        <i class="bi bi-exclamation-circle"></i>
                        <h4 class="problem-card-title">Incidents reported late</h4>
                    </div>
                    <p class="problem-card-text">
                        Verbal escalations, paper forms, and WhatsApp chains create dangerous delays.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
                <div class="problem-card h-100">
                    <div class="problem-icon-box">
                        <i class="bi bi-check2-square"></i>
                        <h4 class="problem-card-title">CAPAs stay open</h4>
                    </div>
                    <p class="problem-card-text">
                        Corrective actions without automated tracking rarely close on time.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
                <div class="problem-card h-100">
                    <div class="problem-icon-box">
                        <i class="bi bi-file-earmark-text"></i>
                        <h4 class="problem-card-title"> Audit evidence scattered</h4>
                    </div>
                    <p class="problem-card-text">
                        Evidence sits in too many places. Proving compliance becomes a sprint.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                <div class="problem-card h-100">
                    <div class="problem-icon-box">
                        <i class="bi bi-eye"></i>
                        <h4 class="problem-card-title">Leadership blind spots</h4>
                    </div>
                    <p class="problem-card-text">
                        Visibility arrives only after something has already gone wrong.
                    </p>
                </div>
            </div>
        </div>
        <!-- Footer Statement -->
        <div class="row">
            <div class="col">
                <p class="problem-footer text-muted">
                    The real issue isn’t the people — it’s the operating model.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="middle-market-section bg-light-blue" id="how-it-works">
    <div class="container max-w-1000 middle-market-container ">
        <div class="row align-items-start gx-lg-5 gy-5">
            <!-- LEFT CONTENT -->
            <div class="col-lg-6" data-aos="zoom-in">
                <div class="middle-market-content">
                    <p class="common-label text-blue">WHY SOAPBOX.CLOUD™</p>
                    <h2 class="common-title">
                    Built for the middle market
                    </h2>
                    <h3 class="common-text">
                        Soapbox.Cloud™ is being built for companies that have outgrown manual coordination but do not want to jump straight into bloated enterprise platforms. We believe there is a better middle path:
                    </h3>
                    <ul class="middle-market-list">
                        <li>Structured enough for compliance</li>
                        <li>Practical enough for operations</li>
                        <li>Simple enough to roll out without months of friction</li>
                    </ul>
                    <p class="common-text">
                        That is what the self-diagnosis below is for. It helps you quickly identify where your current EHS setup is creating delay, blind spots, reporting friction, or control gaps — and whether Soapbox.Cloud™ looks like the right fit for your team.
                    </p>
                    <a href="javascript:void(0)" class="btn middle-market-btn" id="scrollToDiagnostic2">
                        Start self-diagnosis
                        <span class="ms-2">&rarr;</span>
                    </a>
                </div>
            </div>
            <!-- RIGHT CARDS -->
            <div class="col-lg-6" data-aos="zoom-in">
                <div class="middle-market-cards">
                    <div class="feature-box">
                        <h4 class="feature-box-title">Real-time incident reporting</h4>
                        <p class="feature-box-text">
                            Field-friendly workflows that work even in low-connectivity environments. Issues surface in minutes, not days.
                        </p>
                    </div>
                    <div class="feature-box">
                        <h4 class="feature-box-title">Automated CAPA tracking</h4>
                        <p class="feature-box-text">
                            Corrective actions assigned, tracked, and escalated automatically — nothing falls through the cracks.
                        </p>
                    </div>
                    <div class="feature-box">
                        <h4 class="feature-box-title">Audit-ready by default</h4>
                        <p class="feature-box-text">
                            Evidence organised as you work. No pre-audit scramble. 12 months of records, accessible in seconds.
                        </p>
                    </div>
                    <div class="feature-box">
                        <h4 class="feature-box-title">Leadership visibility</h4>
                        <p class="feature-box-text">
                            Cross-site dashboards that give management a consolidated view — without waiting for someone to compile a report.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <p class="problem-footer text-muted mt-4">
            The Early Adopters Programme is limited to the first cohort. Applications are reviewed, not open access.
        </p>
    </div>
</section>
<section class="founder-access-section" data-aos="fade-up">
    <div class="container founder-access-container">
        <!-- Top Label -->
        <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-8">
                <p class="founder-label">WHAT YOU GET</p>
                <h2 class="founder-title">
                Founder-tier access. <br>
                For the teams who move first.
                </h2>
                <h3 class="founder-subtitle">
                    Early adopters don’t just get early access — they help shape what gets built next.
                </h3>
            </div>
        </div>
        <!-- Cards -->
        <div class="row g-4 justify-content-center founder-cards-row">
            <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                <div class="founder-card h-100">
                    <span class="founder-card-number">01</span>
                    <h4 class="founder-card-title">Founder pricing — locked in</h4>
                    <p class="founder-card-text">
                        Early adopter rates secured permanently. Your pricing never changes as the platform grows.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
                <div class="founder-card h-100">
                    <span class="founder-card-number">02</span>
                    <h4 class="founder-card-title">Product roadmap access</h4>
                    <p class="founder-card-text">
                        Direct line into our roadmap. Your operational reality shapes what we prioritise next.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
                <div class="founder-card h-100">
                    <span class="founder-card-number">03</span>
                    <h4 class="founder-card-title">Pilot-first onboarding</h4>
                    <p class="founder-card-text">
                        Start with one site, one workflow, or one team. Prove the value before committing to anything wider.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                <div class="founder-card h-100">
                    <span class="founder-card-number">04</span>
                    <h4 class="founder-card-title">Dedicated setup support</h4>
                    <p class="founder-card-text">
                        We configure your environment with you — not a generic onboarding flow handed over to your IT team.
                    </p>
                </div>
            </div>
        </div>
        <!-- CTA -->
        <div class="row justify-content-center text-center">
            <div class="col-auto">
                <a href="javascript:void(0)" class="btn founder-btn" id="scrollToDiagnostic4">
                    Apply for early access
                    <span class="ms-2">&rarr;</span>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="fit-section" data-aos="fade-up">
    <div class="container  fit-container text-center">
        <!-- Label -->
        <p class="fit-label">WHO THIS IS FOR</p>
        <!-- Title -->
        <h2 class="fit-title">
        We are not looking for everyone
        </h2>
        <!-- Subtitle -->
        <h3 class="fit-subtext">
            We are looking for teams that know their current model is starting to break,
            want a better way forward, and are willing to help shape a product built for
            mid-market operations.
        </h3>
        <!-- Cards -->
        <div class="row justify-content-center g-4 fit-cards-row">
            <!-- Good Fit -->
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
            <!-- Not Right Now -->
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
        <!-- CTA -->
        <div class="fit-cta">
            <a href="javascript:void(0)" class="btn fit-btn" id="scrollToDiagnostic3">
                Find out if you’re a fit
                <span class="ms-2">&rarr;</span>
            </a>
        </div>
    </div>
</section>
<section class="diagnostic py-5 " id="diagnostic" data-aos="fade-up">
    <div class="container max-w-1000">
        <div class="diag-inner">
            <div class="diag-header text-center mx-auto">
                <div class="section-label">Self-diagnosis tool</div>
                <h2>Before we show you the product,<br>let's understand your operation</h2>
                <h3 class="fs-14 text-muted fw-normal lh-base">
                    This is not a generic lead form. It's a short diagnostic to identify your gaps, your fit,
                    and the right pilot path for your team. Answer honestly — the goal is to diagnose accurately,
                    not qualify you in.
                </h3>
            </div>
            <form id="diag-form" action="{{ route('ehs-assessment-store') }}" method="POST" novalidate>
                @csrf
                <div class="diag-progress-top">
                    <div class="section-progress" id="progress-label">Section 1 of 6</div>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar-fill" id="progress-bar"></div>
                    </div>
                </div>
                <!-- ===================== SECTION 1 ===================== -->
                <div class="form-section active" id="s1">
                    <div class="section-num">Section 01 / 06</div>
                    <div class="section-title">Your operating environment</div>
                    <div class="section-desc">
                        Operational complexity changes everything — how incidents are reported,
                        how audits run, and how leadership gets visibility.
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">1. Which industry best describes your operation?</div>
                                <div class="custom-dropdown single-select" data-name="industry" data-placeholder="Select industry">
                                    <div class="dropdown-select">Select industry</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="Manufacturing">Manufacturing</div>
                                        <div class="dropdown-option" data-value="Construction">Construction / Infrastructure</div>
                                        <div class="dropdown-option" data-value="Oil">Oil & Gas</div>
                                        <div class="dropdown-option" data-value="Chemicals">Chemicals / Process Industry</div>
                                        <div class="dropdown-option" data-value="Energy">Energy / Utilities</div>
                                        <div class="dropdown-option" data-value="Logistics">Logistics / Warehousing</div>
                                        <div class="dropdown-option" data-value="Mining">Mining / Metals</div>
                                        <div class="dropdown-option" data-value="Pharma">Pharma / Life Sciences</div>
                                        <div class="dropdown-option" data-value="Food">Food / FMCG</div>
                                        <div class="dropdown-option" data-value="Other">Other</div>
                                    </div>
                                    <input type="hidden" name="industry">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">2. How many employees work across your business?</div>
                                <div class="custom-dropdown single-select" data-name="employees" data-placeholder="Select employee range">
                                    <div class="dropdown-select">Select employee range</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="<100">Fewer than 100</div>
                                        <div class="dropdown-option" data-value="100-500">100 – 500</div>
                                        <div class="dropdown-option" data-value="500-1000">500 – 1,000</div>
                                        <div class="dropdown-option" data-value="1000-5000">1,000 – 5,000</div>
                                        <div class="dropdown-option" data-value=">5000">More than 5,000</div>
                                    </div>
                                    <input type="hidden" name="employees">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">3. How many active sites, plants, or operating locations do you manage?</div>
                                <div class="custom-dropdown single-select" data-name="sites" data-placeholder="Select number of sites">
                                    <div class="dropdown-select">Select number of sites</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="1">1</div>
                                        <div class="dropdown-option" data-value="2-5">2 – 5</div>
                                        <div class="dropdown-option" data-value="6-20">6 – 20</div>
                                        <div class="dropdown-option" data-value="21-50">21 – 50</div>
                                        <div class="dropdown-option" data-value="50+">50+</div>
                                    </div>
                                    <input type="hidden" name="sites">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">4. How geographically distributed are your operations?</div>
                                <div class="custom-dropdown single-select" data-name="distribution" data-placeholder="Select distribution">
                                    <div class="dropdown-select">Select distribution</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="single">Single site</div>
                                        <div class="dropdown-option" data-value="regional">Multiple sites in one city or region</div>
                                        <div class="dropdown-option" data-value="national">Multiple sites across one country</div>
                                        <div class="dropdown-option" data-value="multi-country">Multi-country operations</div>
                                        <div class="dropdown-option" data-value="global">Global / highly distributed</div>
                                    </div>
                                    <input type="hidden" name="distribution">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">5. Do your teams capture data in low-connectivity or offline environments?</div>
                                <div class="custom-dropdown single-select" data-name="mobile" data-placeholder="Select answer">
                                    <div class="dropdown-select">Select answer</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="frequently">Yes — frequently</div>
                                        <div class="dropdown-option" data-value="some-sites">Yes — at some sites</div>
                                        <div class="dropdown-option" data-value="rarely">Rarely</div>
                                        <div class="dropdown-option" data-value="no">No — connectivity is not a challenge</div>
                                    </div>
                                    <input type="hidden" name="mobile">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">6. How much of your workforce operates through contractors or third parties?</div>
                                <div class="custom-dropdown single-select" data-name="contractors" data-placeholder="Select contractor dependence">
                                    <div class="dropdown-select">Select contractor dependence</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="little">Very little</div>
                                        <div class="dropdown-option" data-value="some">Some contractor presence</div>
                                        <div class="dropdown-option" data-value="significant">Significant contractor workforce</div>
                                        <div class="dropdown-option" data-value="core">Contractors are core to how we operate</div>
                                    </div>
                                    <input type="hidden" name="contractors">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-nav">
                        <span></span>
                        <button type="button" class="btn-next" onclick="goTo(2)">
                        Next
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        </button>
                    </div>
                </div>
                <!-- ===================== SECTION 2 ===================== -->
                <div class="form-section" id="s2">
                    <div class="section-num">Section 02 / 06</div>
                    <div class="section-title">How EHS is managed today</div>
                    <div class="section-desc">
                        Not just which tool you use — but who owns it, how reporting actually happens,
                        and whether leadership has timely visibility.
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">7. What is your primary way of managing EHS today?</div>
                                <div class="custom-dropdown single-select" data-name="tool" data-placeholder="Select primary method">
                                    <div class="dropdown-select">Select primary method</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="excel">Excel / Google Sheets</div>
                                        <div class="dropdown-option" data-value="email">Email / WhatsApp / manual checklists</div>
                                        <div class="dropdown-option" data-value="paper">Paper-based forms</div>
                                        <div class="dropdown-option" data-value="generic">Generic project or workflow tool</div>
                                        <div class="dropdown-option" data-value="legacy">Older / legacy EHS software</div>
                                        <div class="dropdown-option" data-value="none">No formal system</div>
                                    </div>
                                    <input type="hidden" name="tool">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">8. How are incidents and near-misses typically reported?</div>
                                <div class="custom-dropdown single-select" data-name="reporting" data-placeholder="Select reporting method">
                                    <div class="dropdown-select">Select reporting method</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="paper">Paper form to supervisor</div>
                                        <div class="dropdown-option" data-value="whatsapp">WhatsApp / phone / verbal escalation</div>
                                        <div class="dropdown-option" data-value="email">Email to EHS or admin team</div>
                                        <div class="dropdown-option" data-value="spreadsheet">Spreadsheet or shared tracker entry</div>
                                        <div class="dropdown-option" data-value="digital">Through a formal digital workflow</div>
                                        <div class="dropdown-option" data-value="varies">It varies by site</div>
                                    </div>
                                    <input type="hidden" name="reporting">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">9. How long to prepare a reliable EHS report for management or audits?</div>
                                <div class="custom-dropdown single-select" data-name="report_time" data-placeholder="Select reporting time">
                                    <div class="dropdown-select">Select reporting time</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="same-day">Same day</div>
                                        <div class="dropdown-option" data-value="1-2">1 – 2 days</div>
                                        <div class="dropdown-option" data-value="3-5">3 – 5 days</div>
                                        <div class="dropdown-option" data-value="week+">More than a week</div>
                                        <div class="dropdown-option" data-value="depends">Depends on who is available to compile it</div>
                                    </div>
                                    <input type="hidden" name="report_time">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">10. Who owns EHS system administration or coordination today?</div>
                                <div class="custom-dropdown single-select" data-name="ownership" data-placeholder="Select ownership">
                                    <div class="dropdown-select">Select ownership</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="corp">Corporate EHS team</div>
                                        <div class="dropdown-option" data-value="site">Site EHS manager</div>
                                        <div class="dropdown-option" data-value="ops">Operations / plant leadership</div>
                                        <div class="dropdown-option" data-value="it">IT / systems / digital team</div>
                                        <div class="dropdown-option" data-value="shared">Shared across multiple teams</div>
                                        <div class="dropdown-option" data-value="none">No clear owner</div>
                                    </div>
                                    <input type="hidden" name="ownership">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">11. How often is EHS performance reviewed by leadership?</div>
                                <div class="custom-dropdown single-select" data-name="review_frequency" data-placeholder="Select review frequency">
                                    <div class="dropdown-select">Select review frequency</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="weekly">Weekly</div>
                                        <div class="dropdown-option" data-value="monthly">Monthly</div>
                                        <div class="dropdown-option" data-value="quarterly">Quarterly</div>
                                        <div class="dropdown-option" data-value="audits">Only before audits or incidents</div>
                                        <div class="dropdown-option" data-value="rarely">Rarely / ad hoc</div>
                                    </div>
                                    <input type="hidden" name="review_frequency">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">12. How does leadership usually get visibility into EHS performance?</div>
                                <div class="custom-dropdown single-select" data-name="leadership_view" data-placeholder="Select visibility method">
                                    <div class="dropdown-select">Select visibility method</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="dashboard">Consolidated dashboard or system reports</div>
                                        <div class="dropdown-option" data-value="ppt">PowerPoint / manual summary packs</div>
                                        <div class="dropdown-option" data-value="sheets">Spreadsheet roll-ups from sites</div>
                                        <div class="dropdown-option" data-value="email">Email updates from site teams</div>
                                        <div class="dropdown-option" data-value="reactive">Leadership only sees data when something goes wrong</div>
                                    </div>
                                    <input type="hidden" name="leadership_view">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-back" onclick="goTo(1)">← Back</button>
                        <button type="button" class="btn-next" onclick="goTo(3)">
                        Next
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        </button>
                    </div>
                </div>
                <!-- ===================== SECTION 3 ===================== -->
                <div class="form-section" id="s3">
                    <div class="section-num">Section 03 / 06</div>
                    <div class="section-title">Where the current model breaks</div>
                    <div class="section-desc">
                        Most teams keep EHS moving through effort and workarounds. This section identifies
                        the pressure points — where visibility drops, follow-through slows, and blind spots emerge.
                    </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="question">
                                <div class="q-label">13. Where does your EHS setup break down most often?</div>
                                <div class="q-sub">Select all that apply</div>
                                <div class="custom-dropdown multi-select" data-name="problems[]" data-placeholder="Select one or more issues">
                                    <div class="dropdown-select">Select one or more issues</div>
                                    <div class="dropdown-menu-custom">
                                        <label class="dropdown-check-option"><input type="checkbox" value="late-reporting"> Incident reporting is delayed or inconsistent</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="capa"> Corrective actions and CAPAs are hard to track to closure</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="audits"> Audits are managed manually and follow-up is difficult</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="near-miss"> Near-misses or unsafe conditions go unreported</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="compliance"> Compliance obligations or deadlines are easy to miss</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="scattered"> Evidence is scattered across spreadsheets, emails, and local files</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="visibility"> Leadership lacks a consolidated view across sites</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="people"> We rely too heavily on a few people to keep everything moving</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="scrutiny"> We are not confident our process would stand up under scrutiny</label>
                                    </div>
                                    <div class="hidden-inputs"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">14. The one issue that creates the most operational risk today?</div>
                                <div class="custom-dropdown single-select" data-name="risk_issue" data-placeholder="Select top risk issue">
                                    <div class="dropdown-select">Select top risk issue</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="delayed-visibility">Delayed incident visibility</div>
                                        <div class="dropdown-option" data-value="capa">Weak CAPA / action follow-through</div>
                                        <div class="dropdown-option" data-value="audit">Audit readiness</div>
                                        <div class="dropdown-option" data-value="compliance">Compliance tracking and renewals</div>
                                        <div class="dropdown-option" data-value="leadership-vis">Poor leadership visibility</div>
                                        <div class="dropdown-option" data-value="site-execution">Inconsistent site-level execution</div>
                                        <div class="dropdown-option" data-value="slow-reporting">Reporting takes too long</div>
                                        <div class="dropdown-option" data-value="fragmented">Evidence is too fragmented</div>
                                    </div>
                                    <input type="hidden" name="risk_issue">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">15. If an auditor asked for 12 months of EHS records tomorrow — how prepared would you be?</div>
                                <div class="custom-dropdown single-select" data-name="audit_readiness" data-placeholder="Select audit readiness">
                                    <div class="dropdown-select">Select audit readiness</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="ready">Fully prepared — data is organised and accessible</div>
                                        <div class="dropdown-option" data-value="1-2days">Could pull it together in 1 – 2 days</div>
                                        <div class="dropdown-option" data-value="several-days">Several days and still some manual cleanup</div>
                                        <div class="dropdown-option" data-value="week+">A week or more</div>
                                        <div class="dropdown-option" data-value="scattered">Information is scattered across sites, files, and people</div>
                                    </div>
                                    <input type="hidden" name="audit_readiness">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">16. How often do EHS issues become visible only after they've escalated?</div>
                                <div class="custom-dropdown single-select" data-name="issue_visibility" data-placeholder="Select frequency">
                                    <div class="dropdown-select">Select frequency</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="rarely">Rarely</div>
                                        <div class="dropdown-option" data-value="sometimes">Sometimes</div>
                                        <div class="dropdown-option" data-value="often">Often</div>
                                        <div class="dropdown-option" data-value="very-often">Very often</div>
                                        <div class="dropdown-option" data-value="usually">That is usually how we find out</div>
                                    </div>
                                    <input type="hidden" name="issue_visibility">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-back" onclick="goTo(2)">← Back</button>
                        <button type="button" class="btn-next" onclick="goTo(4)">
                        Next
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        </button>
                    </div>
                </div>
                <!-- ===================== SECTION 4 ===================== -->
                <div class="form-section" id="s4">
                    <div class="section-num">Section 04 / 06</div>
                    <div class="section-title">Compliance exposure and proof of control</div>
                    <div class="section-desc">
                        It's about whether obligations are clearly understood, deadlines tracked,
                        and evidence produced with confidence when an auditor or regulator asks.
                    </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="question">
                                <div class="q-label">17. Which standards or obligations are most relevant to your operations?</div>
                                <div class="q-sub">Select all that apply</div>
                                <div class="custom-dropdown multi-select" data-name="frameworks[]" data-placeholder="Select relevant frameworks">
                                    <div class="dropdown-select">Select relevant frameworks</div>
                                    <div class="dropdown-menu-custom">
                                        <label class="dropdown-check-option"><input type="checkbox" value="iso45001"> ISO 45001</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="iso14001"> ISO 14001</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="ifc"> IFC EHS Guidelines</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="esg"> ESG / CSRD / GRI / BRSR reporting</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="local"> Local labour, safety, or environmental regulations</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="client"> Customer / client compliance requirements</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="corporate"> Internal corporate compliance requirements</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="unsure"> Not fully sure which ones apply across all sites</label>
                                    </div>
                                    <div class="hidden-inputs"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">18. Any regulatory findings, fines, or enforcement actions in the last 3 years?</div>
                                <div class="custom-dropdown single-select" data-name="fines" data-placeholder="Select answer">
                                    <div class="dropdown-select">Select answer</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="none">No</div>
                                        <div class="dropdown-option" data-value="minor">Yes — minor findings</div>
                                        <div class="dropdown-option" data-value="repeated">Yes — repeated findings or unresolved issues</div>
                                        <div class="dropdown-option" data-value="significant">Yes — significant enforcement or serious concern</div>
                                        <div class="dropdown-option" data-value="pnts">Prefer not to say</div>
                                    </div>
                                    <input type="hidden" name="fines">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">19. How are permits, licenses, and compliance deadlines tracked today?</div>
                                <div class="custom-dropdown single-select" data-name="deadline_tracking" data-placeholder="Select tracking method">
                                    <div class="dropdown-select">Select tracking method</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="manual">Manually — spreadsheets or calendar reminders</div>
                                        <div class="dropdown-option" data-value="email">Through email follow-ups and individual owners</div>
                                        <div class="dropdown-option" data-value="consultant">Through a consultant or external advisor</div>
                                        <div class="dropdown-option" data-value="inconsistent">Some tracking, but inconsistent</div>
                                        <div class="dropdown-option" data-value="reactive">We often discover deadlines reactively</div>
                                        <div class="dropdown-option" data-value="formal">Through a formal system with reminders and status tracking</div>
                                    </div>
                                    <input type="hidden" name="deadline_tracking">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">20. How confident are you that you could prove compliance status across sites without manual reconciliation?</div>
                                <div class="custom-dropdown single-select" data-name="compliance_confidence" data-placeholder="Select confidence level">
                                    <div class="dropdown-select">Select confidence level</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="very">Very confident</div>
                                        <div class="dropdown-option" data-value="reasonable">Reasonably confident, but some manual work needed</div>
                                        <div class="dropdown-option" data-value="low">Low confidence — it would take significant effort</div>
                                        <div class="dropdown-option" data-value="multiple">We'd need to pull data from multiple people and sources</div>
                                    </div>
                                    <input type="hidden" name="compliance_confidence">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-back" onclick="goTo(3)">← Back</button>
                        <button type="button" class="btn-next" onclick="goTo(5)">
                        Next
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        </button>
                    </div>
                </div>
                <!-- ===================== SECTION 5 ===================== -->
                <div class="form-section" id="s5">
                    <div class="section-num">Section 05 / 06</div>
                    <div class="section-title">What comes next for your business</div>
                    <div class="section-desc">
                        The best pilots happen when there is both a clear problem today and a clear direction
                        for tomorrow. Tell us where you're headed.
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">21. How important is ESG or operational governance on your leadership agenda?</div>
                                <div class="custom-dropdown single-select" data-name="esg" data-placeholder="Select importance">
                                    <div class="dropdown-select">Select importance</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="strategic">Very important — already a strategic priority</div>
                                        <div class="dropdown-option" data-value="increasing">Increasingly important</div>
                                        <div class="dropdown-option" data-value="emerging">Important, but still emerging</div>
                                        <div class="dropdown-option" data-value="not-near-term">Not a near-term focus</div>
                                        <div class="dropdown-option" data-value="unsure">Not sure yet</div>
                                    </div>
                                    <input type="hidden" name="esg">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">22. What would make a new EHS platform worth adopting in the next 12 months?</div>
                                <div class="q-sub">Select up to 3</div>
                                <div class="custom-dropdown multi-select limit-3" data-name="priority[]" data-placeholder="Select up to 3 priorities">
                                    <div class="dropdown-select">Select up to 3 priorities</div>
                                    <div class="dropdown-menu-custom">
                                        <label class="dropdown-check-option"><input type="checkbox" value="incident-reporting"> Faster incident and issue reporting</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="capa-closure"> Better CAPA / action closure</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="audit-readiness"> More reliable audit readiness</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="compliance"> Stronger compliance tracking</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="leadership"> Better visibility for leadership</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="standardise"> Standardised processes across sites</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="mobile"> Mobile / field-friendly execution</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="esg"> Better ESG or sustainability reporting readiness</label>
                                        <label class="dropdown-check-option"><input type="checkbox" value="less-manual"> Less dependence on spreadsheets and manual follow-up</label>
                                    </div>
                                    <div class="hidden-inputs"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">23. Are you actively evaluating a new EHS platform in the next 12 months?</div>
                                <div class="custom-dropdown single-select" data-name="evaluation_timeline" data-placeholder="Select timeline">
                                    <div class="dropdown-select">Select timeline</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="active">Yes — actively now</div>
                                        <div class="dropdown-option" data-value="3m">Likely within 3 months</div>
                                        <div class="dropdown-option" data-value="6-12m">Possibly within 6 – 12 months</div>
                                        <div class="dropdown-option" data-value="exploring">Exploring, but no defined timeline</div>
                                        <div class="dropdown-option" data-value="not-now">Not currently</div>
                                    </div>
                                    <input type="hidden" name="evaluation_timeline">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="question">
                                <div class="q-label">24. Would you be open to a structured pilot before a wider rollout?</div>
                                <div class="custom-dropdown single-select" data-name="pilot_interest" data-placeholder="Select pilot interest">
                                    <div class="dropdown-select">Select pilot interest</div>
                                    <div class="dropdown-menu-custom">
                                        <div class="dropdown-option" data-value="yes">Yes — definitely</div>
                                        <div class="dropdown-option" data-value="maybe">Possibly, if the scope is right</div>
                                        <div class="dropdown-option" data-value="later">Maybe later</div>
                                        <div class="dropdown-option" data-value="no">No — we'd only evaluate a full solution</div>
                                    </div>
                                    <input type="hidden" name="pilot_interest">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="question">
                                <div class="q-label">25. In one sentence — what would success look like if this worked well for your team?</div>
                                <textarea class="text-inp" name="success" placeholder="e.g. better visibility across sites, faster incident response, less manual reporting, stronger audit readiness, fewer missed actions."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-back" onclick="goTo(4)">← Back</button>
                        <button type="button" class="btn-next" onclick="goTo(6)">
                        Next
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        </button>
                    </div>
                </div>
                <!-- ===================== SECTION 6 ===================== -->
                <div class="form-section" id="s6">
                    <div class="section-num">Section 06 / 06</div>
                    <div class="section-title">Your details</div>
                    <div class="section-desc">
                        Last step — tell us who should receive the assessment follow-up.
                    </div>
                    <div class="capture-box">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Full name</label>
                                    <input
                                    class="field-inp"
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Jane Smith"
                                    required
                                    minlength="3"
                                    pattern="^[A-Za-z.'\-\s]+$"
                                    >
                                    <div class="invalid-feedback">
                                        Please enter a valid full name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Work email</label>
                                    <input
                                    class="field-inp"
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="jane@company.com"
                                    required
                                    >
                                    <div class="invalid-feedback">
                                        Please enter a valid work email address.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Country</label>
                                    <input class="field-inp" type="text" name="country" placeholder="United Arab Emirates">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Phone</label>
                                    <input class="field-inp" type="text" name="phone" placeholder="+971 50 123 4567">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Company</label>
                                    <input class="field-inp" type="text" name="company" placeholder="Acme Corp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Your role</label>
                                    <input class="field-inp" type="text" name="role" placeholder="e.g. Head of EHS, VP Operations">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label class="field-label">Preferred demo date</label>
                                    <input class="field-inp" type="date" name="schedule">
                                </div>
                            </div>
                        </div>
                        <div class="capture-note">
                            By submitting, you agree we may use your answers to personalise your product demo and pilot path.
                            We will never sell your data.
                        </div>
                    </div>
                    <div class="mt-3">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-back" onclick="goTo(5)">← Back</button>
                        <button type="button" class="btn-next" onclick="submitAssessment()">
                        Submit diagnosis
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        </button>
                    </div>
                </div>
                <!-- ===================== THANK YOU ===================== -->
                <div class="thankyou" id="thankyou">
                    <div class="ty-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                            <path d="M22 4L12 14.01l-3-3"/>
                        </svg>
                    </div>
                    <div class="ty-h">Diagnosis received.</div>
                    <p class="ty-p">
                        We'll review your answers and reach out within 2 business days with your gap assessment,
                        fit score, and a suggested pilot path tailored to your operation.
                    </p>
                    <div class="ty-tag">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        Expect a response within 2 business days
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
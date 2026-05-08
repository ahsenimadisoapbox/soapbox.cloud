@extends('layouts.frontend')
@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'Who We Are | SOAPBOX.CLOUD™',
    'description' => $meta->meta_description ?? 'Get first access to Soapbox enterprise cloud platform for compliance, safety, quality, and governance. Join the Early Adopters Program.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
@section('content')
<section class="hero ">
    <div class="container text-center max-w-800">
        <div class="tag">WHO WE ARE</div>
        <h1 class="section-title">Built by People Who Understand <span class="text-forth">What Is at Stake.</span></h1>
        <h3 class="section-sub my-0 mx-auto fs-16 fw-normal text-muted">SOAPBOX.CLOUD™ was built by enterprise technology leaders who spent decades inside regulated industries
            — where a missed compliance deadline is a regulatory action, a delayed incident report is a liability, and an untracked corrective action is a life at risk.
        We built what we knew was missing.</h3>
    </div>
</section>
<section class="py-5">
    <div class="container max-w-1000">
        <div class="row text-center border rounded-4 overflow-hidden stats-wrapper align-items-stretch">
            <div class="col-md-3 p-4 border-end ">
                <div class="stats-item h-100">
                    <div class=" fs-40 text-gradient-blue">200+</div>
                    <h5 class="fw-normal text-muted small">
                        Years inside regulated enterprise systems
                    </h5>
                </div>
            </div>
            <div class="col-md-3 p-4 border-end ">
                <div class="stats-item h-100">
                    <div class="fs-40 text-gradient-blue">4</div>
                    <h5 class="fw-normal text-muted small">
                        Continents. National-scale programmes delivered
                    </h5>
                </div>
            </div>
            <div class="col-md-3 p-4 border-end ">
                <div class="stats-item h-100">
                    <div class="fs-40 text-gradient-blue">9</div>
                    <h5 class="fw-normal text-muted small">
                        Senior leaders across technology, EHS, and sustainability
                    </h5>
                </div>
            </div>
            <div class="col-md-3 p-4 ">
                <div class="stats-item h-100">
                    <div class="fs-40 text-gradient-blue">21</div>
                    <h5 class="fw-normal text-muted small">
                        Modules. One platform. Engineered from lived experience
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container max-w-1200">
        <div class="tag mb-2">OUR FOUNDATION</div>
        <h2 class="section-title">The Experience Behind the Platform.</h2>
        <h3 class="section-sub mb-4 fw-normal">Every module in SOAPBOX.CLOUD™ was shaped by direct, first-hand experience in the industries it serves.</h3>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card min-h-300 border rounded-4 custom-card">
                    <div class="card-body p-3">
                        <div class="icon-box icon-yellow mb-4">
                            🏗️
                        </div>
                        <h4 class="fw-semibold fs-16 mb-3">
                        Decades in Regulated Industries
                        </h4>
                        <p class="fs-14 text-grey mb-0">
                            Financial services, heavy engineering, digital infrastructure, and industrial operations — where compliance is a condition of operating, not a checkbox.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card min-h-300 border rounded-4 custom-card">
                    <div class="card-body p-3">
                        <div class="icon-box icon-green mb-4">
                            ⚡
                        </div>
                        <h4 class="fw-semibold fs-16 mb-3">
                        Enterprise Scale, Startup Speed
                        </h4>
                        <p class="fs-14 text-grey mb-0">
                            We have delivered national-scale technology programmes. We bring that rigour to SOAPBOX.CLOUD™ — with the speed and focus that only a founding team can.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card min-h-300 border rounded-4 custom-card active-card">
                    <div class="card-body p-3">
                        <div class="icon-box icon-blue mb-4">
                            🌍
                        </div>
                        <h4 class="fw-semibold fs-16 mb-3">
                        Forged in Global Enterprise
                        </h4>
                        <p class="fs-14 text-grey mb-0">
                            Our leadership brings decades of experience across regulated industries worldwide — delivering programmes where governance and operational accountability are non-negotiable.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card min-h-300 border rounded-4 custom-card">
                    <div class="card-body p-3">
                        <div class="icon-box icon-pink mb-4">
                            🎯
                        </div>
                        <h4 class="fw-semibold fs-16 mb-3">
                        One Team. One Mission.
                        </h4>
                        <p class="fs-14 text-grey mb-0">
                            Senior professionals across technology, EHS, sustainability, and enterprise operations — united by one conviction: safety deserves better infrastructure.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container max-w-1200">
        <div class="tag mb-2">LEADERSHIP</div>
        <h2 class="section-title">The People Behind SOAPBOX.CLOUD™.</h2>
        <h3 class="section-sub mb-4">
            A founding team that has built, governed, and scaled enterprise systems across four continents.
        </h3>
        <div class="row justify-content-center g-4 mb-4 ">
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                    <img src="images/boardmembers/mohdMoizuddin.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Mohammed Moizuddin</h4>
                                <h5 class="small text-primary">Founder & CEO</h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        20+ years in regulated financial services and enterprise technology. Former IBM Partner and Asia-Pacific Head of Applications. Senior Vice President at DBS Bank. Best of IBM Award 2012. Built SOAPBOX.CLOUD™ from the conviction that safety infrastructure must match the industries it protects.                        </p>
                        <a href="https://www.linkedin.com/in/mohammedmoizuddin/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                    <img src="images/boardmembers/RickBrowne.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Rick P Browne</h4>
                                <h5 class="small text-primary">Non-Executive Director</h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Seasoned enterprise governance leader with extensive boardroom experience across technology and regulated industries. Brings strategic oversight and institutional discipline to SOAPBOX.CLOUD™'s growth trajectory.                        </p>
                        <a href="https://www.linkedin.com/in/rick-browne-mscs-a519374/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/SyedImran.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Syed Imran, Ph.D.</h4>
                                <h5 class="small text-primary">
                                    Chief Advisor — Environment & Sustainability
                                </h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Doctoral expertise in environmental science and sustainability strategy. Advises SOAPBOX.CLOUD™ on environmental module architecture, ESG data frameworks, and regulatory alignment across global markets.                        </p>
                        <a href="https://www.linkedin.com/in/saimran/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/SyedMazharuddin.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">
                                Syed Mazharuddin, Ph.D.</h4>
                                <h5 class="small text-primary">Partner & Chief Advisor — Sustainability & Circular Economy</h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Doctoral researcher in circular economy and industrial sustainability. Shapes SOAPBOX.CLOUD™'s sustainability modules and ensures the platform meets emerging ESG reporting standards worldwide.                        </p>
                        <a href="https://www.linkedin.com/in/mazharuddin-syed-ahmed-phd-4917709/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/MahaboobAliKhan.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Mahaboob Ali Khan</h4>
                                <h5 class="small text-primary">Chief Advisor — EHS</h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Senior EHS practitioner with deep operational experience across heavy industry. Ensures every SOAPBOX.CLOUD™ module reflects ground-level EHS realities — from incident investigation workflows to compliance tracking logic.                        </p>
                        <a href="https://www.linkedin.com/in/mahaboob-ali-khan-772a668/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/ShaikKhaja.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Shaik Khaja Mohiuddin</h4>
                                <h5 class="small text-primary">
                                Partner & Chief Advisor — Heavy Engineering Industries                                
                            </h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Extensive leadership in heavy engineering and industrial operations. Advises on platform configuration for high-risk sectors including oil and gas, mining, and infrastructure.                        </p>
                        <a href="https://www.linkedin.com/in/shaik-khaja-mohiuddin-716165a/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/KareemQureshi.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Kareem Qureshi</h4>
                                <h5 class="small text-primary">Executive Vice President & CTO</h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Enterprise technology architect with decades of experience building scalable, cloud-native platforms. Leads SOAPBOX.CLOUD™'s technical vision, platform architecture, and engineering execution.                    </p>
                        <a href="https://www.linkedin.com/in/kareem-qureshi-b-eng-pmp-0817924/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/BandaSrikanth.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Banda Srikanth</h4>
                                <h5 class="small text-primary">Executive Vice President & CIO</h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Information systems leader with deep expertise in enterprise data architecture, integration frameworks, and operational intelligence systems across regulated industries.                       </p>
                        <a href="https://www.linkedin.com/in/banda-srikanth-886ab322/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card min-h-350 border rounded-4 p-3 leadership-card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="initial-box me-3">
                                        <img src="images/boardmembers/SanjaySengupta.png" alt="Mohammed Moizuddin" class="initial-img" loading="lazy">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-semibold fs-18">Sanjay Sengupta</h4>
                                <h5 class="small text-primary">
                                    Executive Vice President & COO
                                </h5>
                            </div>
                        </div>
                        <p class="fs-12 text-muted">
                        Operations leader with experience across enterprise programme delivery, client success, and operational scaling. Ensures SOAPBOX.CLOUD™ delivers on its deployment and service commitments.                    </p>
                        <a href="https://www.linkedin.com/in/sanjay-sengupta-21378910/" class="btn btn-sm btn-third rounded-pill">
                            <i class="fa-brands fa-linkedin me-1"></i> LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container max-w-1200">
        <div class="tag mb-2 text-success">WHAT GUIDES US</div>
        <h2 class="section-title mb-4">Our Principles.</h2>
        <div class="row g-0 border rounded-4 overflow-hidden principles-wrapper align-items-stretch">
            <!-- ITEM 1 -->
            <div class="col-md-3 ">
                <div class="principles-item h-100 p-4 border-end">
                    <div class="icon-box icon-pink mb-3">
                        🎯
                    </div>
                    <h4 class="fw-semibold fs-14">Client Success First</h4>
                    <p class="fs-12 text-muted mb-0">
                        We measure success by the outcomes we deliver for our clients — not the features we ship.
                    </p>
                </div>
            </div>
            <!-- ITEM 2 -->
            <div class="col-md-3 ">
                <div class="principles-item h-100 p-4 border-end">
                    <div class="icon-box icon-yellow mb-3">
                        ⚖️
                    </div>
                    <h4 class="fw-semibold fs-14">Truth Over Theory</h4>
                    <p class="fs-12 text-muted mb-0">
                        We prioritise what works in the real world over what works on paper.
                    </p>
                </div>
            </div>
            <!-- ITEM 3 -->
            <div class="col-md-3 ">
                <div class="principles-item h-100 p-4 border-end">
                    <div class="icon-box icon-blue mb-3">
                        🛡️
                    </div>
                    <h4 class="fw-semibold fs-14">Responsible by Design</h4>
                    <p class="fs-12 text-muted mb-0">
                        We embed accountability and long-term responsibility into everything we build.
                    </p>
                </div>
            </div>
            <!-- ITEM 4 -->
            <div class="col-md-3 ">
                <div class="principles-item h-100 p-4">
                    <div class="icon-box icon-green mb-3">
                        💎
                    </div>
                    <h4 class="fw-semibold fs-14">Excellence Without Compromise</h4>
                    <p class="fs-12 text-muted mb-0">
                        We uphold the highest standards in every outcome we deliver.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container max-w-1200">
        <div class="tag mb-2 text-success">OUR VISION</div>
        <h2 class="section-title">Where We Are Headed.</h2>
        <h3 class="section-sub mb-4">
            Five commitments that define what SOAPBOX.CLOUD™ is being built to achieve.
        </h3>
        <div class="row justify-content-center g-4">
            <!-- CARD 1 -->
            <div class="col-md-4 col-lg">
                <div class="vision-card text-center min-h-150 p-4">
                    <div class="vision-num text-blue">01</div>
                    <h5 class="vision-title fw-semibold mt-2">
                        Every preventable incident — prevented.
                    </h5>
                    <p class="vision-desc text-muted mt-2 mb-0">
                        The right information, in the right hands, at the right time.
                    </p>
                </div>
            </div>
            <!-- CARD 2 -->
            <div class="col-md-4 col-lg">
                <div class="vision-card text-center min-h-150 p-4">
                    <div class="vision-num text-blue">02</div>
                    <h5 class="vision-title fw-semibold mt-2">
                        Every regulated enterprise — operating with clarity.
                    </h5>
                    <p class="vision-desc text-muted mt-2 mb-0">
                        Full visibility across every site, team, and shift.
                    </p>
                </div>
            </div>
            <!-- CARD 3 -->
            <div class="col-md-4 col-lg">
                <div class="vision-card text-center min-h-150 p-4">
                    <div class="vision-num text-blue">03</div>
                    <h5 class="vision-title fw-semibold mt-2">
                        Compliance as the natural outcome.
                    </h5>
                    <p class="vision-desc text-muted mt-2 mb-0">
                        Built into how work happens — not added on.
                    </p>
                </div>
            </div>
            <!-- CARD 4 -->
            <div class="col-md-4 col-lg">
                <div class="vision-card text-center min-h-150 p-4">
                    <div class="vision-num text-blue">04</div>
                    <h5 class="vision-title fw-semibold mt-2">
                        Technology equal to the industries we serve.
                    </h5>
                    <p class="vision-desc text-muted mt-2 mb-0">
                        Built to the same standard as the work it supports.
                    </p>
                </div>
            </div>
            <!-- CARD 5 -->
            <div class="col-md-4 col-lg">
                <div class="vision-card text-center min-h-150 p-4">
                    <div class="vision-num text-blue">05</div>
                    <h5 class="vision-title fw-semibold mt-2">
                        Every decision leaves the planet better.
                    </h5>
                    <p class="vision-desc text-muted mt-2 mb-0">
                        Every decision creates a measurable positive impact.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="closer">
    <div class="container px-3  justify-content-center text-center text-white">
        <div class="closer-content max-w-1000">
            <p class="closer-quote">
            "We did not set out to build another software company. We set out to build the platform that regulated industries have needed for twenty years — engineered with the same discipline we spent our careers upholding."</p>
            <div class="closer-author">— The SOAPBOX.CLOUD™ Founding Team</div>
            <a href="{{ route('eap') }}" class="btn btn-first" onclick="showPage('eap')">Get Early Access →</a>
        </div>
    </div>
</section>
@endsection
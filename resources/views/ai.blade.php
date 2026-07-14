@extends('layouts.frontend')

@section('content')

<section class="hero ai-hero">
    <div class="ai-overlay"></div>

    <div class="container " data-aos="zoom-in">

        <div class="row ">

            <div class="col-md-7">

                <div class="hero-livebadge mx-auto mb-4">

                    EHS AI Assist
                </div>

                <h1 class="hero-title title text-white">
                    AI-assisted workflows for 
                    <br>
                    <span class="text-green">audit-ready operations.</span>
                </h1>

                <p class="industry-main-desc text-white">
                    SOAPBOX.CLOUD™ EHS AI Assist helps teams improve record quality, draft stronger actions, summarize complex workflows, detect missing information, 
                    and turn operational data into better decisions — while keeping humans in control.
                </p>

                <div class="d-flex flex-column flex-sm-row  gap-3">
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
            <div class="col-md-5 my-auto">
                <div id="heroDemoVideo" class="industry2-ai-video-wrapper">

                    <video class="industry2-ai-video"
                            muted
                            loop
                            playsinline
                            poster="{{ asset('images/ai-assist2.webp') }}"
                            preload="metadata">

                        <source src="{{ asset('videos/Description1.mp4') }}"
                                    type="video/mp4">

                    </video>
                    <div class="video-overlay"></div>
                    <div class="video-play-btn">
                        <i class="bi bi-play-fill"></i>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

<section class="ai-module-strip-section pt-4 pb-2">

    <div class="container-fluid px-0 ">

        <div class="section-label text-center">

            <span>AI USE CASES</span>

        </div>

        <div class="ai-module-strip">

            <div class="ai-module-track py-3">

                @foreach($aiModules as $module)

                    <a
                        href="{{ route('ehs-ai-module.show', $module->slug) }}"
                        class="ai-strip-card">

                        <img
                            src="{{ asset($module->ai_assist_image) }}"
                            alt="{{ $module->name }}">

                        <div class="ai-strip-overlay">

                            <h5>
                                {{ $module->name }}
                            </h5>

                        </div>

                    </a>

                @endforeach

                {{-- Duplicate for seamless scroll --}}

                @foreach($aiModules as $module)

                    <a
                        href="{{ route('ehs-ai-module.show', $module->slug) }}"
                        class="ai-strip-card bg-gradient-customeblue">

                        <img
                            src="{{ asset($module->ai_assist_image) }}"
                            alt="{{ $module->name }}">

                        <div class="ai-strip-overlay">

                            <h5>
                                {{ $module->name }}
                            </h5>

                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    </div>

</section>

<section class="ai-problem-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT CONTENT -->
            <div class="col-lg-5">

                <div class="ai-problem-content">

                    <span class="section-label ">
                        WHY EHS TEAMS NEED AI ASSIST
                    </span>

                    <h2 class="ai-problem-title">
                        EHS teams do not suffer from lack of data.
                        <span>
                            They suffer from execution gaps.
                        </span>
                    </h2>

                    <p class="ai-problem-description">
                        Poor-quality records, delayed actions,
                        scattered evidence and disconnected workflows
                        create operational risk every day.
                    </p>

                </div>

            </div>

            <!-- RIGHT CONTENT -->

            <div class="col-lg-7">

                <div class="ai-problem-stack">

                    <div class="ai-problem-card">
                        <h3>Weak Incident Descriptions</h3>
                        <p>
                            A serious incident may start as a weak description.
                        </p>
                    </div>

                    <div class="ai-problem-card">
                        <h3>Vague CAPAs</h3>
                        <p>
                            Actions fail when they are unclear or incomplete.
                        </p>
                    </div>

                    <div class="ai-problem-card">
                        <h3>Incomplete Audit Evidence</h3>
                        <p>
                            Findings become difficult to defend.
                        </p>
                    </div>

                    <div class="ai-problem-card">
                        <h3>Stale Risk Registers</h3>
                        <p>
                            Risks are not reviewed consistently.
                        </p>
                    </div>

                    <div class="ai-problem-card">
                        <h3>Complex Compliance Tasks</h3>
                        <p>
                            Obligations become difficult to translate into action.
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <div class="ai-problem-footer">

            EHS AI Assist is designed to reduce these everyday execution gaps.

        </div>

    </div>

</section>

<section class="ai-demo-section py-2">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="ai-demo-video-wrapper bg-seventh">

                    <div class="ai-demo-video-cover" id="aiDemoTriggerRCA">

                        <video
                            class="ai-demo-video-preview"
                            muted
                            playsinline
                            preload="metadata"
                            poster="{{ asset('images/ai-assist.webp') }}">

                            <source
                                src="{{ asset('videos/RCA.mp4') }}"
                                type="video/mp4">

                        </video>

                        <div class="ai-demo-overlay"></div>

                        <div class="ai-demo-play-btn">

                            <i class="fas fa-play"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="capabilities-section py-5">

    <div class="container">

        <div class="section-header">

            <span class="section-label">
                AI CAPABILITIES
            </span>

            <h2 class="section-title">
                What EHS AI Assist Does
            </h2>

            <p class="section-description">
                Embedded across your EHS workflows to improve record quality,
                strengthen actions, reduce manual effort and improve readiness.
            </p>

        </div>
        <div class="capabilities-stage">
            <div class="row g-4 mx-2">

                <div class="col-md-4">
                    <div class="capability-card card-1">
                        <div class="d-flex justify-content-center align-items-center ">
                            <div class="capability-icon mx-3">
                                📝
                            </div>
                            <h3>
                                Write Better Records
                            </h3>

                        </div>
        
        
                        <p>
                            Improve incident, audit, risk, CAPA and observation descriptions.
                        </p>
        
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="capability-card card-2">
                        <div class="d-flex justify-content-center align-items-center ">

                            <div class="capability-icon mx-3">
                                🔍
                            </div>
            
                            <h3>
                                Detect Missing Information
                            </h3>
                        </div>
        
        
                        <p>
                            Check completeness before submission or closure.
                        </p>
        
                    </div>
                </div>
    
                <div class="col-md-4">

                    <div class="capability-card card-3">
                        <div class="d-flex justify-content-center align-items-center ">
                            <div class="capability-icon mx-3">
                                ⚡
                            </div>
            
                            <h3>
                                Draft Stronger Actions
                            </h3>

                        </div>
        
        
                        <p>
                            Generate CAPAs, mitigations, corrective actions.
                        </p>
        
                    </div>
                </div>

            </div>
            <div class="row g-4 mx-2">

                <div class="col-md-4">
                    <div class="capability-card card-4">
                        <div class="d-flex justify-content-center align-items-center ">
                            <div class="capability-icon mx-3">
                                    📊
                            </div>
                    
                            <h3>
                                Summarize Complex Records
                            </h3>

                        </div>
                
                        <p>
                            Executive summaries for audits, incidents and management reviews.
                        </p>
                
                    </div>
                </div>
    
                <div class="col-md-4">
                    
    
                    <div class="capability-card card-5">
                        <div class="d-flex justify-content-center align-items-center ">

                            <div class="capability-icon mx-3">
                                🏷️
                            </div>
        
                            <h3>
                                Suggest Classifications
                            </h3>
                        </div>
    
    
                        <p>
                            Hazard categories, impact areas, action types and risk classifications.
                        </p>
    
                    </div>
                </div>
                <div class="col-md-4">
    
                    <div class="capability-card card-6">
                        <div class="d-flex justify-content-center align-items-center ">

                            <div class="capability-icon mx-3">
                                🛡️
                            </div>
        
                            <h3>
                                Strengthen Audit Readiness
                            </h3>
        
                        </div>
    
                        <p>
                            Check evidence, readiness, closure quality and overdue actions.
                        </p>
    
                    </div>
                </div>
            </div>
                
        </div>

    </div>

</section>

<section class="human-loop-section py-5">
	<div class="container">
		<div class="row justify-content-center text-center mb-5">
			<div class="col-lg-8">
				<span class="section-badge">
					HUMAN-IN-THE-LOOP ASSURANCE
				</span>
				<h2 class="fs-32 fw-bold mt-3">
				AI Assists. Humans Decide.
				</h2>
				<p class="fs-16 text-visible mt-3">
					EHS AI Assist supports decision-making, but final decisions remain
					with authorized users. Every AI-generated recommendation can be
					reviewed, edited, accepted, rejected, or regenerated before use.
				</p>
			</div>
		</div>
		<div class="row align-items-center g-5">
			<!-- Left Side Workflow -->
			<div class="col-md-7">
				<div class="workflow-wrapper">
					<!-- AI Suggestion -->
					<div class="workflow-card ai-card">
						<div class="workflow-icon">
							<i class="bi bi-cpu"></i>
						</div>
						<h4>AI Suggestions</h4>
						<ul>
							<li class="text-visible">Improve Incident Description</li>
							<li class="text-visible">Identify Missing Information</li>
							<li class="text-visible">Draft CAPA Actions</li>
							<li class="text-visible">Suggest Risk Classifications</li>
						</ul>
					</div>
					<div class="flow-line"></div>
					<!-- Human Review -->
					<div class="decision-gate">
						<div class="shield-icon">
							<i class="bi bi-shield-check"></i>
						</div>
						<h4>Human Decision Gate</h4>
						<p>
							Authorized users review every AI recommendation
							before any action is taken.
						</p>
						<div class="decision-buttons">
							<div class="decision-btn reject">
								Reject
							</div>
							<div class="decision-btn edit">
								Edit
							</div>
							<div class="decision-btn accept">
								Accept
							</div>
						</div>
					</div>
					<div class="flow-line"></div>
					<!-- Audit Trail -->
					<div class="workflow-card audit-card">
						<div class="workflow-icon">
							<i class="bi bi-clock-history"></i>
						</div>
						<h4>Audit Trail &amp; Version History</h4>
						<p class="mb-0 text-visible">
							Every accepted action is logged with user,
							timestamp, version history, and audit trail.
						</p>
					</div>
				</div>
			</div>
			<!-- Right Side Governance -->
			<div class="col-md-5">
				<div class="governance-grid">
					<div class="governance-card">
						<i class="bi bi-pencil-square"></i>
						<h5>Editable</h5>
						<p>
							AI-generated outputs remain fully editable.
						</p>
					</div>
					<div class="governance-card">
						<i class="bi bi-arrow-repeat"></i>
						<h5>Regeneratable</h5>
						<p>
							Create alternative suggestions anytime.
						</p>
					</div>
					<div class="governance-card">
						<i class="bi bi-file-earmark-text"></i>
						<h5>Version History</h5>
						<p>
							Track changes across revisions.
						</p>
					</div>
					<div class="governance-card">
						<i class="bi bi-building-lock"></i>
						<h5>Tenant Safe</h5>
						<p>
							Respects tenant and role boundaries.
						</p>
					</div>
				</div>
				<div class="restrictions-box mt-4">
					<h5>AI Cannot:</h5>
					<ul class="mb-0">
						<li>Close CAPAs Automatically</li>
						<li>Approve Incidents</li>
						<li>Downgrade Risks</li>
						<li>Make Compliance Decisions</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ai-connected-section py-5">
	<div class="container">
					<div class="text-center mb-5">
						<span class="ai-section-tag">
							ONE PLATFORM. ALWAYS CONNECTED.
						</span>
						<h2 class="fs-32 fw-bold mt-3">
						Why SOAPBOX.CLOUD™ EHS AI Assist Is Different
						</h2>
						<p class="fs-16 text-muted mx-auto" style="max-width:850px;">
							Most AI tools sit outside the workflow. EHS AI Assist is embedded
							directly inside records, tasks, reviews, audit trails, and tenant
							security controls—making every suggestion context-aware and
							operationally relevant.
						</p>
					</div>
					<div class="row align-items-center">
						<!-- LEFT CONTENT -->
						<div class="col-lg-5">
							<div class="difference-card">
								<h4>
								AI Inside The Workflow
								</h4>
								<p>
									AI suggestions remain connected to the exact incident,
									CAPA, audit, risk, obligation, inspection, permit,
									training record, document, or evidence item that
									triggered them.
								</p>
								<div class="mt-4">
									<div class="feature-item">
										<i class="bi bi-check-circle-fill"></i>
										Embedded into operational workflows
									</div>
									<div class="feature-item">
										<i class="bi bi-check-circle-fill"></i>
										Controlled by tenant configuration
									</div>
									<div class="feature-item">
										<i class="bi bi-check-circle-fill"></i>
										Uses module context and master data
									</div>
									<div class="feature-item">
										<i class="bi bi-check-circle-fill"></i>
										Human review before saving outputs
									</div>
								</div>
							</div>
						</div>
						<!-- CENTER DIAGRAM -->
						<div class="col-lg-7 d-none d-md-block">
							<div class="platform-network py-4">
                                <svg class="network-svg" viewBox="0 0 1000 600">

                                    <path id="line1" class="network-line"
                                        d="M500 90 L500 180 L500 240"/>

                                    <path id="line2" class="network-line"
                                        d="M220 150 L350 150 L350 260 L450 260"/>

                                    <path id="line3" class="network-line"
                                        d="M180 300 L350 300 L450 300"/>

                                    <path id="line4" class="network-line"
                                        d="M260 450 L350 450 L350 340 L450 340"/>

                                    <path id="line5" class="network-line"
                                        d="M500 520 L500 400"/>

                                    <path id="line6" class="network-line"
                                        d="M780 150 L650 150 L650 260 L550 260"/>

                                    <path id="line7" class="network-line"
                                        d="M820 300 L650 300 L550 300"/>

                                    <path id="line8" class="network-line"
                                        d="M740 450 L650 450 L650 340 L550 340"/>

                                    <!-- ENERGY DOTS -->

                                    <circle id="dot1" class="energy-dot" r="5"/>
                                    <circle id="dot2" class="energy-dot" r="5"/>
                                    <circle id="dot3" class="energy-dot" r="5"/>
                                    <circle id="dot4" class="energy-dot" r="5"/>
                                    <circle id="dot5" class="energy-dot" r="5"/>
                                    <circle id="dot6" class="energy-dot" r="5"/>
                                    <circle id="dot7" class="energy-dot" r="5"/>
                                    <circle id="dot8" class="energy-dot" r="5"/>

                                </svg>
								<div class="module incident">
									Incident
								</div>
								<div class="module audit">
									Audit
								</div>
								<div class="module risk">
									Risk
								</div>
								<div class="module capa">
									CAPA
								</div>
								<div class="module compliance">
									Compliance
								</div>
								<div class="module inspection">
									Inspection
								</div>
								<div class="module permit">
									PTW
								</div>
								<div class="module training">
									Training
								</div>
								<div class="ai-core">
									<div class="ai-core-inner">
										<span>EHS</span>
										<small>AI Assist</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- BOTTOM BENEFITS -->
					<div class="row mt-5 g-4">
						<div class="col-md-3">
							<div class="benefit-card">
								<h6>Audit Ready</h6>
								<p>
									Supports audit trail and version history.
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="benefit-card">
								<h6>Secure By Design</h6>
								<p>
									Respects role, site, and tenant boundaries.
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="benefit-card">
								<h6>Built For EHS</h6>
								<p>
									Designed for regulated operations.
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="benefit-card danger">
								<h6>Human Controlled</h6>
								<p>
									No automatic approvals, closures, downgrades, or legal decisions.
								</p>
							</div>
						</div>
					</div>
				</div>
</section>

 <section class="closer">
        <div class="compliance-bottom-cta">
            <h3>
                See EHS AI Assist <br>in Action.
            </h3>
            <div class="mt-4">
                <div class="trust-badges">
                    <span class="trust-badge">Incidents</span>
                    <span class="trust-badge">CAPA </span>
                    <span class="trust-badge">Audits </span>
                    <span class="trust-badge">Risk </span>
                    <span class="trust-badge">Compliance </span>
                    <span class="trust-badge">NCR </span>
                    <span class="trust-badge">Inspection  </span>
                    <span class="trust-badge">JSA  </span>
                    <span class="trust-badge">Safety Observation </span>
                    <span class="trust-badge">Near Miss </span>
                </div>
            </div>
            <a href="{{route('eap')}}#diagnostic"
               class="btn btn-first">

                Take the 30-sec EHS Check-Diagnosis →

            </a>
            <p class="mt-3">
                EHS AI Assist is not a chatbot bolted onto EHS software. 
                It is embedded intelligence for regulated operations — helping teams create better records, stronger actions, better evidence, and faster management insight.
            </p>
            
            <!-- <small>
                Trusted by oil & gas, industrial, and regulated operations across MENA and APAC.

            </small>
            <small>Operational Intelligence For Teams Transitioning From Spreadsheets.</small> -->
        </div>
</section>


<div class="modal fade"
     id="aiDemoModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content bg-dark border-0">

            <div class="modal-header border-0">

                <h5 class="modal-title text-white">
                    SOAPBOX.CLOUD™ AI Demo
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body p-0">

                <video
                    id="demoVideo"
                    controls

                    class="industry3-ai-video">

                    <source
                        src="{{ asset('videos/Description1.mp4') }}"
                        type="video/mp4">

                </video>

            </div>

        </div>

    </div>

</div>

<div
    class="modal fade"
    id="aiDemoModalRCA"
    tabindex="-1">

    <div
        class="modal-dialog modal-xl modal-dialog-centered max-h-400px">

        <div
            class="modal-content bg-dark border-0">

            <div class="modal-header border-0">

                <h5 class="text-white mb-0">

                    EHS AI Assist Demo

                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body p-0">

                <video
                    id="aiDemoVideoRCA"
                    controls
                    class="industry3-ai-video"
                    >

                    <source
                        src="{{ asset('videos/RCA.mp4') }}"
                        type="video/mp4">

                </video>

            </div>

        </div>

    </div>

</div>

<script src="{{ asset('js/ai-page.js') }}"></script>
@endsection
@extends('layouts.frontend')

@section('content')

    <section class="bg-light-blue py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">

                    <div class="card border-0 rounded-4 shadow text-center p-4 p-md-5">

                        <!-- Animated Check Icon -->
                        <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle"
                            style="width: 80px; height: 80px; background: rgba(34,197,94,0.1);">
                            <i class="fa-solid fa-circle-check" style="font-size: 2.4rem; color: #22c55e;"></i>
                        </div>

                        <!-- Heading -->
                        <h2 class="fw-bold mb-2" style="font-size: 1.75rem; letter-spacing: -0.02em;">
                            Thank You!
                        </h2>
                        <p class="text-muted mb-4" style="font-size: 1rem; line-height: 1.65;">
                            Your message has been successfully submitted.<br>
                            We'll get back to you within <strong class="text-dark">24 hours</strong>.
                        </p>

                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- What happens next -->
                        <div class="text-start mb-4">
                            <p class="fw-semibold mb-3"
                                style="font-size: 0.85rem; letter-spacing: 0.06em; text-transform: uppercase; color: #FF5C35;">
                                What happens next?
                            </p>
                            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                                <li class="d-flex align-items-start gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width:32px; height:32px; background:rgba(255,92,53,0.08); margin-top:1px;">
                                        <i class="fa-solid fa-envelope" style="font-size:0.75rem; color:#FF5C35;"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-semibold" style="font-size:0.9rem;">Confirmation email sent</p>
                                        <p class="mb-0 text-muted" style="font-size:0.82rem;">Check your inbox for a copy of
                                            your submission.</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width:32px; height:32px; background:rgba(255,92,53,0.08); margin-top:1px;">
                                        <i class="fa-solid fa-user-tie" style="font-size:0.75rem; color:#FF5C35;"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-semibold" style="font-size:0.9rem;">Our team reviews your message
                                        </p>
                                        <p class="mb-0 text-muted" style="font-size:0.82rem;">We read every message
                                            carefully and personally.</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width:32px; height:32px; background:rgba(255,92,53,0.08); margin-top:1px;">
                                        <i class="fa-solid fa-reply" style="font-size:0.75rem; color:#FF5C35;"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-semibold" style="font-size:0.9rem;">We'll be in touch</p>
                                        <p class="mb-0 text-muted" style="font-size:0.82rem;">Expect a reply within 1
                                            business day.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- CTA Buttons -->
                        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-house"></i>
                                Back to Home
                            </a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-paper-plane"></i>
                                Send Another Message
                            </a>
                        </div>

                    </div>

                    <!-- Response time badge -->
                    <div class="text-center mt-4">
                        <span class="badge rounded-pill px-3 py-2"
                            style="background:rgba(34,197,94,0.1); color:#16a34a; font-size:0.8rem; font-weight:500; border: 1px solid rgba(34,197,94,0.2);">
                            <i class="fa-solid fa-circle me-1" style="font-size:0.45rem; vertical-align:middle;"></i>
                            Typically responds within 24 hours
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
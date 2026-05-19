@extends('layouts.frontend')
@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'Early Adopters Program for Soapbox Cloud | Join Now',
    'description' => $meta->meta_description ?? 'Get first access to Soapbox enterprise cloud platform for compliance, safety, quality, and governance. Join the Early Adopters Program.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
@section('content')
    <div class="bg-light-blue py-5">
        <div class="container max-w-1200 mx-auto">
            <div class="row g-5">
                <div class="col-md-4">
                    <div class="text-first tag">Contact us</div>
                    <h1 class="section-title">Let's start a conversation</h1>
                    <p>Fill in the form and we'll get back to you as soon as possible. Whether it's a product question,
                        enterprise inquiry, or just feedback — we're all ears.</p>
                    <div class="row g-4">

                        <!-- Email Us -->
                        <div class="col-md-12">
                            <div class="card border h-100 shadow-sm">
                                <div class="card-body d-flex align-items-start gap-3 p-4">
                                    <div class="rounded-3 p-3 flex-shrink-0" style="background: rgba(255,92,53,0.08);">
                                        <i class="fa-regular fa-envelope" style="font-size: 1.2rem; color: #FF5C35;"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Email us</h6>
                                        <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                            hello@soapbox.cloud
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="col-md-12">
                            <div class="card border h-100 shadow-sm">
                                <div class="card-body d-flex align-items-start gap-3 p-4">
                                    <div class="rounded-3 p-3 flex-shrink-0" style="background: rgba(255,92,53,0.08);">
                                        <i class="fa-regular fa-clock" style="font-size: 1.2rem; color: #FF5C35;"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Business hours</h6>
                                        <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                            Mon – Fri, 9am – 6pm EST
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="text-center mt-4">
                        <span class="badge rounded-pill px-3 py-2"
                            style="background:rgba(34,197,94,0.1); color:#16a34a; font-size:0.8rem; font-weight:500; border: 1px solid rgba(34,197,94,0.2);">
                            <i class="fa-solid fa-circle me-1" style="font-size:0.45rem; vertical-align:middle;"></i>
                            Typically responds within 24 hours
                        </span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card rounded-4 border-0 shadow">
                        <div class="card-body p-3 p-md-5">
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf

                                <div class="row g-3">

                                    <!-- First Name & Last Name -->
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                            id="first_name" name="first_name" value="{{ old('first_name') }}"
                                            placeholder="Jane" required>
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            id="last_name" name="last_name" value="{{ old('last_name') }}"
                                            placeholder="Smith">
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email & Phone -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="jane@company.com" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone / Mobile</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}"
                                            placeholder="+1 (555) 000-0000">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Company & Country -->
                                    <div class="col-md-6">
                                        <label for="company" class="form-label">Company</label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company" value="{{ old('company') }}"
                                            placeholder="Acme Inc.">
                                        @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror"
                                            id="country" name="country" value="{{ old('country') }}"
                                            placeholder="United States">
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- How did you hear about us -->
                                    <div class="col-12">
                                        <label for="hear_about" class="form-label">How did you hear about us?</label>
                                        <select class="form-select @error('hear_about') is-invalid @enderror"
                                            id="hear_about" name="hear_about">
                                            <option value="" disabled {{ old('hear_about') ? '' : 'selected' }}>Select an
                                                option</option>
                                            <option value="Google" {{ old('hear_about') == 'Google' ? 'selected' : '' }}>
                                                Google</option>
                                            <option value="Social Media" {{ old('hear_about') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                            <option value="Referral" {{ old('hear_about') == 'Referral' ? 'selected' : '' }}>
                                                Referral</option>
                                            <option value="Advertisement" {{ old('hear_about') == 'Advertisement' ? 'selected' : '' }}>Advertisement</option>
                                        </select>
                                        @error('hear_about')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Message -->
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message"
                                            name="message" rows="5" placeholder="Tell us how we can help you..."
                                            required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Send Message
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! NoCaptcha::renderJs() !!}
@endsection

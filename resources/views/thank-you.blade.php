@extends('layouts.frontend')

@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'SOAPBOX.CLOUD™ | Intelligent Platform for Responsible Enterprises',
    'description' => $meta->meta_description ?? 'Manage compliance, safety, and risk workflows in one enterprise operating system. Soapbox Cloud helps regulated teams automate and stay audit-ready.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection

@section('style')
<style>
  .ty-section {
    background: #F0F2F5;
    min-height: 100dvh;
    display: flex;
    align-items: center;
    padding: 48px 16px;
  }

  .ty-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.09);
    max-width: 540px;
    width: 100%;
    margin: 0 auto;
  }

  /* ── top accent bar ── */
  .ty-accent-bar { height: 4px; }

  /* ── hero ── */
  .ty-hero {
    padding: 44px 40px 32px;
    text-align: center;
    background: #fafafa;
    border-bottom: 1px solid #EEEEEE;
  }

  .ty-icon-wrap {
    width: 72px; height: 72px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 20px;
  }

  .ty-heading {
    font-size: 1.7rem;
    font-weight: 800;
    color: #0b1c3d;
    letter-spacing: -0.03em;
    margin: 0 0 8px;
  }

  .ty-subheading {
    font-size: 0.95rem;
    color: #6B7280;
    margin: 0 0 10px;
    line-height: 1.55;
  }

  .ty-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 600;
    border: 1px solid transparent;
    margin-top: 4px;
  }

  .ty-badge-dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    display: inline-block;
    animation: pulse-dot 1.8s ease-in-out infinite;
  }

  @keyframes pulse-dot {
    0%, 100% { opacity: 1; transform: scale(1); }
    50%       { opacity: 0.5; transform: scale(0.7); }
  }

  /* ── body ── */
  .ty-body { padding: 36px 40px; }

  .ty-intro {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.7;
    margin: 0 0 28px;
    padding: 16px 18px;
    border-radius: 10px;
    border-left: 3px solid;
    background: #F7F9FC;
  }

  /* ── steps ── */
  .ty-steps-label {
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #9CA3AF;
    margin: 0 0 16px;
  }

  .ty-step {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 16px;
  }

  .ty-step:last-child { margin-bottom: 0; }

  .ty-step-icon {
    width: 38px; height: 38px;
    border-radius: 10px;
    background: #F3F4F6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .ty-step-title {
    font-size: 0.88rem;
    font-weight: 700;
    color: #0b1c3d;
    margin: 0 0 2px;
  }

  .ty-step-body {
    font-size: 0.8rem;
    color: #6B7280;
    margin: 0;
    line-height: 1.5;
  }

  /* ── divider ── */
  .ty-divider {
    height: 1px;
    background: #EEEEEE;
    margin: 28px 0;
  }

  /* ── CTA ── */
  .ty-ctas {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  @media (min-width: 480px) {
    .ty-ctas { flex-direction: row; }
  }

  .ty-btn {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 12px 20px;
    border-radius: 10px;
    font-size: 0.88rem;
    font-weight: 700;
    text-decoration: none;
    transition: opacity 0.15s, transform 0.12s;
    border: none;
    cursor: pointer;
  }

  .ty-btn:hover { opacity: 0.88; transform: translateY(-1px); }

  .ty-btn-primary { color: #fff; }

  .ty-btn-secondary {
    background: #F3F4F6;
    color: #374151;
  }

  /* ── footer badge ── */
  .ty-footer-badge {
    text-align: center;
    margin-top: 24px;
  }

  .ty-footer-badge span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 16px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 500;
  }

  @media (max-width: 480px) {
    .ty-hero   { padding: 32px 24px 24px; }
    .ty-body   { padding: 28px 24px; }
    .ty-heading { font-size: 1.4rem; }
  }
</style>
@endsection

@section('content')
<section class="ty-section">
  <div style="width:100%">

    <div class="ty-card">

      {{-- Accent bar --}}
      <div class="ty-accent-bar" style="background:{{ $config['accent'] }}"></div>

      {{-- Hero --}}
      <div class="ty-hero">
        <div class="ty-icon-wrap"
          style="background:{{ $config['badge_bg'] }}">
          {{ $config['icon'] }}
        </div>

        <h1 class="ty-heading">{{ $config['heading'] }}</h1>
        <p class="ty-subheading">{{ $config['subheading'] }}</p>

        <span class="ty-badge"
          style="background:{{ $config['badge_bg'] }};
                 color:{{ $config['badge_color'] }};
                 border-color:{{ $config['badge_color'] }}33">
          <span class="ty-badge-dot"
            style="background:{{ $config['badge_color'] }}"></span>
          {{ $config['badge_text'] }}
        </span>
      </div>

      {{-- Body --}}
      <div class="ty-body">

        {{-- Flash message or intro --}}
        @if(session('success'))
          <div class="ty-intro" style="border-color:{{ $config['accent'] }}">
            {{ session('success') }}
          </div>
        @else
          <div class="ty-intro" style="border-color:{{ $config['accent'] }}">
            {!! $config['intro'] !!}
          </div>
        @endif

        {{-- Steps --}}
        <p class="ty-steps-label">What happens next</p>

        @foreach($config['steps'] as $step)
          <div class="ty-step">
            <div class="ty-step-icon"
              style="background:{{ $config['badge_bg'] }}">
              {{ $step['icon'] }}
            </div>
            <div>
              <p class="ty-step-title">{{ $step['title'] }}</p>
              <p class="ty-step-body">{{ $step['body'] }}</p>
            </div>
          </div>
        @endforeach

        <div class="ty-divider"></div>

        {{-- CTA buttons --}}
        <div class="ty-ctas">
          <a href="{{ $config['primary_cta']['url'] }}"
            class="ty-btn ty-btn-primary"
            style="background:{{ $config['accent'] }}">
            {{ $config['primary_cta']['label'] }}
            &rarr;
          </a>
          <a href="{{ $config['secondary_cta']['url'] }}"
            class="ty-btn ty-btn-secondary">
            {{ $config['secondary_cta']['label'] }}
          </a>
        </div>

      </div>
    </div>

    {{-- Footer badge --}}
    <div class="ty-footer-badge">
      <span style="background:{{ $config['badge_bg'] }};
                   color:{{ $config['badge_color'] }};
                   border:1px solid {{ $config['badge_color'] }}33">
        <span class="ty-badge-dot"
          style="background:{{ $config['badge_color'] }}"></span>
        {{ $config['badge_text'] }}
      </span>
    </div>

  </div>
</section>
@endsection
{{-- resources/views/admin/console/index.blade.php --}}
@extends('layouts.backend')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#0C1524; --ink2:#1E2D45; --muted:#637693; --border:#E3EAF3;
  --surface:#F7FAFD; --white:#fff;
  --blue:#1D5FC4; --blue-bg:rgba(29,95,196,.09); --blue-bd:rgba(29,95,196,.22);
  --green:#16A34A; --green-bg:rgba(22,163,74,.09); --green-bd:rgba(22,163,74,.22);
  --red:#DC2626;   --red-bg:rgba(220,38,38,.09);   --red-bd:rgba(220,38,38,.22);
  --amber:#B45309; --amber-bg:rgba(180,83,9,.09);  --amber-bd:rgba(180,83,9,.22);
  --mono:'JetBrains Mono',monospace; --sans:'DM Sans',sans-serif;
  --r:12px; --r-lg:18px;
  --shadow:0 1px 4px rgba(12,21,36,.06),0 4px 16px rgba(12,21,36,.08);
  --shadow-lg:0 8px 32px rgba(12,21,36,.13);
}
body{font-family:var(--sans);}

/* ── PAGE HEADER ── */
.sc-header{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;flex-wrap:wrap;margin-bottom:32px;}
.sc-title-wrap{display:flex;align-items:center;gap:14px;}
.sc-logo{width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#1D5FC4,#0EA5B4);
  display:flex;align-items:center;justify-content:center;box-shadow:0 4px 14px rgba(29,95,196,.25);flex-shrink:0;}
.sc-logo svg{width:22px;height:22px;color:#fff;}
.sc-title{font-size:22px;font-weight:700;color:var(--ink);letter-spacing:-.02em;margin:0 0 3px;}
.sc-sub{font-size:13px;color:var(--muted);margin:0;}
.env-pill{display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:100px;
  font-family:var(--mono);font-size:10px;font-weight:600;letter-spacing:.07em;
  background:var(--amber-bg);border:1px solid var(--amber-bd);color:var(--amber);}
.env-dot{width:6px;height:6px;border-radius:50%;background:var(--amber);}

/* ── ALERT BANNER ── */
.sc-alert{display:flex;align-items:flex-start;gap:12px;padding:14px 18px;border-radius:var(--r);
  background:var(--amber-bg);border:1px solid var(--amber-bd);margin-bottom:28px;font-size:13px;color:var(--amber);}
.sc-alert svg{width:18px;height:18px;flex-shrink:0;margin-top:1px;}
.sc-alert strong{font-weight:600;}

/* ── SECTION LABEL ── */
.sc-section-label{font-size:11px;font-weight:700;letter-spacing:.10em;text-transform:uppercase;
  color:var(--muted);margin:28px 0 12px;display:flex;align-items:center;gap:10px;}
.sc-section-label::after{content:'';flex:1;height:1px;background:var(--border);}

/* ── COMMAND CARD ── */
.cmd-card{background:var(--white);border:1.5px solid var(--border);border-radius:var(--r-lg);
  padding:20px 22px;display:flex;align-items:center;gap:16px;
  box-shadow:var(--shadow);transition:box-shadow .25s,border-color .25s,transform .2s;margin-bottom:10px;}
.cmd-card:hover{box-shadow:var(--shadow-lg);border-color:rgba(29,95,196,.2);transform:translateY(-2px);}
.cmd-card.danger-card:hover{border-color:var(--red-bd);}

/* Icon */
.cmd-icon{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;
  justify-content:center;flex-shrink:0;transition:transform .3s;}
.cmd-card:hover .cmd-icon{transform:scale(1.1) rotate(-5deg);}
.cmd-icon svg{width:22px;height:22px;}
.ci-blue  {background:var(--blue-bg);  color:var(--blue);}
.ci-green {background:var(--green-bg); color:var(--green);}
.ci-red   {background:var(--red-bg);   color:var(--red);}
.ci-amber {background:var(--amber-bg); color:var(--amber);}

/* Text */
.cmd-info{flex:1;min-width:0;}
.cmd-name{font-family:var(--mono);font-size:13px;font-weight:600;color:var(--ink);margin-bottom:3px;}
.cmd-desc{font-size:12px;color:var(--muted);font-weight:400;}

/* Artisan string */
.cmd-artisan{font-family:var(--mono);font-size:11px;color:var(--blue);
  background:var(--blue-bg);border:1px solid var(--blue-bd);
  padding:2px 9px;border-radius:6px;white-space:nowrap;flex-shrink:0;}
.danger-card .cmd-artisan{color:var(--red);background:var(--red-bg);border-color:var(--red-bd);}

/* Run button */
.btn-run-cmd{height:38px;padding:0 20px;border-radius:var(--r);cursor:pointer;
  font-family:var(--sans);font-size:13px;font-weight:600;
  display:inline-flex;align-items:center;gap:7px;border:1.5px solid;
  transition:background .18s,transform .14s,box-shadow .18s;white-space:nowrap;flex-shrink:0;}
.btn-run-cmd.primary{background:var(--blue);border-color:var(--blue);color:#fff;
  box-shadow:0 3px 12px rgba(29,95,196,.3);}
.btn-run-cmd.primary:hover{background:#1750A8;transform:translateY(-1px);box-shadow:0 6px 18px rgba(29,95,196,.4);}
.btn-run-cmd.danger{background:var(--red);border-color:var(--red);color:#fff;
  box-shadow:0 3px 12px rgba(220,38,38,.25);}
.btn-run-cmd.danger:hover{background:#B91C1C;transform:translateY(-1px);}
.btn-run-cmd svg{width:14px;height:14px;}

/* ── DANGER MODAL ── */
.sc-modal-overlay{position:fixed;inset:0;background:rgba(12,21,36,.55);backdrop-filter:blur(4px);
  z-index:1050;display:flex;align-items:center;justify-content:center;
  opacity:0;pointer-events:none;transition:opacity .25s;}
.sc-modal-overlay.open{opacity:1;pointer-events:auto;}
.sc-modal{background:#fff;border-radius:20px;padding:36px;max-width:440px;width:90%;
  box-shadow:0 24px 64px rgba(12,21,36,.25);transform:scale(.95);transition:transform .25s;}
.sc-modal-overlay.open .sc-modal{transform:scale(1);}
.sc-modal-icon{width:52px;height:52px;border-radius:14px;background:var(--red-bg);
  display:flex;align-items:center;justify-content:center;margin-bottom:20px;}
.sc-modal-icon svg{width:26px;height:26px;color:var(--red);}
.sc-modal h3{font-size:17px;font-weight:700;color:var(--ink);margin:0 0 8px;letter-spacing:-.01em;}
.sc-modal p{font-size:13px;color:var(--muted);line-height:1.65;margin:0 0 24px;}
.sc-modal-warning{background:var(--red-bg);border:1px solid var(--red-bd);border-radius:var(--r);
  padding:12px 14px;font-size:12px;color:var(--red);margin-bottom:24px;display:flex;gap:8px;}
.sc-modal-warning svg{width:15px;height:15px;flex-shrink:0;margin-top:1px;}
.sc-modal-actions{display:flex;gap:10px;justify-content:flex-end;}
.btn-cancel{height:38px;padding:0 18px;border-radius:var(--r);border:1.5px solid var(--border);
  background:#fff;color:var(--muted);font-family:var(--sans);font-size:13px;font-weight:500;
  cursor:pointer;transition:border-color .18s,color .18s;}
.btn-cancel:hover{border-color:var(--ink);color:var(--ink);}
.btn-confirm-danger{height:38px;padding:0 20px;border-radius:var(--r);
  background:var(--red);border:1.5px solid var(--red);color:#fff;
  font-family:var(--sans);font-size:13px;font-weight:600;cursor:pointer;
  transition:background .18s;display:inline-flex;align-items:center;gap:7px;}
.btn-confirm-danger:hover{background:#B91C1C;}
.btn-confirm-danger svg{width:14px;height:14px;}

/* Hidden POST forms */
.hidden-form{display:none;}
</style>
@endpush

@section('content')

{{-- PAGE HEADER --}}
<div class="sc-header">
  <div class="sc-title-wrap">
    <div class="sc-logo">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/>
      </svg>
    </div>
    <div>
      <h1 class="sc-title">System Console</h1>
      <p class="sc-sub">Run Artisan commands · view output · logs stored automatically</p>
    </div>
  </div>
  <div class="env-pill">
    <span class="env-dot"></span>
    {{ strtoupper(app()->environment()) }}
  </div>
</div>

{{-- PRODUCTION WARNING --}}
@if(app()->isProduction())
<div class="sc-alert">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
    <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
    <line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
  </svg>
  <div><strong>Production environment detected.</strong>
    Destructive commands (Fresh Migration + Seed) are blocked. All actions are logged.</div>
</div>
@endif

{{-- COMMAND SECTIONS --}}
@foreach($sections as $sectionName => $cmds)

<div class="sc-section-label">{{ $sectionName }}</div>

@foreach($cmds as $key => $cmd)
<div class="cmd-card {{ $cmd['danger'] ? 'danger-card' : '' }}">

  {{-- Icon --}}
  <div class="cmd-icon {{ $cmd['danger'] ? 'ci-red' : 'ci-blue' }}">
    @if($cmd['icon'] === 'database')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <ellipse cx="12" cy="5" rx="9" ry="3"/>
      <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/>
      <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
    </svg>
    @elseif($cmd['icon'] === 'refresh')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <polyline points="23 4 23 10 17 10"/>
      <path d="M20.49 15a9 9 0 11-2.12-9.36L23 10"/>
    </svg>
    @elseif($cmd['icon'] === 'trash')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <polyline points="3 6 5 6 21 6"/>
      <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
    </svg>
    @elseif($cmd['icon'] === 'bolt')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
    </svg>
    @elseif($cmd['icon'] === 'link')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/>
      <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/>
    </svg>
    @else
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/>
    </svg>
    @endif
  </div>

  {{-- Info --}}
  <div class="cmd-info">
    <div class="cmd-name">{{ $cmd['label'] }}</div>
    <div class="cmd-desc">{{ $cmd['description'] }}</div>
  </div>

  {{-- Artisan string --}}
  <code class="cmd-artisan">
    {{ collect($cmd['artisan'])->pluck('cmd')->implode(' · ') }}
  </code>

  {{-- Run button / danger triggers modal --}}
  @if($cmd['danger'])
    <button class="btn-run-cmd danger" onclick="openDangerModal('{{ $key }}', '{{ addslashes($cmd['label']) }}')">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
        <line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
      </svg>
      Run (Danger)
    </button>
  @else
    {{-- Normal POST form --}}
    <form method="POST" action="{{ route('admin.console.run', $key) }}" class="hidden-form" id="form-{{ $key }}">
      @csrf
    </form>
    <button class="btn-run-cmd primary" onclick="submitForm('{{ $key }}')">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" width="14" height="14">
        <polygon points="5 3 19 12 5 21 5 3"/>
      </svg>
      Run
    </button>
  @endif

</div>
@endforeach

{{-- Hidden POST forms for dangerous commands --}}
@foreach($cmds as $key => $cmd)
  @if($cmd['danger'])
  <form method="POST" action="{{ route('admin.console.run', $key) }}" class="hidden-form" id="form-{{ $key }}">
    @csrf
  </form>
  @endif
@endforeach

@endforeach

{{-- DANGER CONFIRMATION MODAL --}}
<div class="sc-modal-overlay" id="dangerOverlay" onclick="closeDangerModal(event)">
  <div class="sc-modal">
    <div class="sc-modal-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
        <line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
      </svg>
    </div>
    <h3 id="modalTitle">Confirm Dangerous Action</h3>
    <p id="modalBody">Are you sure you want to run this command?</p>
    <div class="sc-modal-warning">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
      </svg>
      This action is <strong>irreversible</strong>. All data will be lost. This is blocked in production environments.
    </div>
    <div class="sc-modal-actions">
      <button class="btn-cancel" onclick="closeDangerModal()">Cancel</button>
      <button class="btn-confirm-danger" id="dangerConfirmBtn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <polygon points="5 3 19 12 5 21 5 3"/>
        </svg>
        Yes, Run
      </button>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
function submitForm(key) {
  document.getElementById('form-' + key)?.submit();
}

let pendingDangerKey = null;

function openDangerModal(key, label) {
  pendingDangerKey = key;
  document.getElementById('modalTitle').textContent = 'Run: ' + label;
  document.getElementById('modalBody').textContent =
    'You are about to run "' + label + '". This will permanently destroy data and cannot be undone.';
  document.getElementById('dangerOverlay').classList.add('open');
}

function closeDangerModal(e) {
  if (e && e.target !== document.getElementById('dangerOverlay')) return;
  document.getElementById('dangerOverlay').classList.remove('open');
  pendingDangerKey = null;
}

document.getElementById('dangerConfirmBtn').addEventListener('click', () => {
  if (pendingDangerKey) {
    document.getElementById('dangerOverlay').classList.remove('open');
    document.getElementById('form-' + pendingDangerKey)?.submit();
  }
});

// Close modal on Escape
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeDangerModal();
});
</script>
@endpush
{{-- resources/views/admin/console/result.blade.php --}}
@extends('layouts.backend')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --ink: #0C1524;
            --ink2: #1E2D45;
            --muted: #637693;
            --border: #E3EAF3;
            --surface: #F7FAFD;
            --white: #fff;
            --blue: #1D5FC4;
            --blue-bg: rgba(29, 95, 196, .09);
            --blue-bd: rgba(29, 95, 196, .22);
            --green: #16A34A;
            --green-bg: rgba(22, 163, 74, .09);
            --green-bd: rgba(22, 163, 74, .22);
            --red: #DC2626;
            --red-bg: rgba(220, 38, 38, .09);
            --red-bd: rgba(220, 38, 38, .22);
            --amber: #B45309;
            --amber-bg: rgba(180, 83, 9, .09);
            --mono: 'JetBrains Mono', monospace;
            --sans: 'DM Sans', sans-serif;
            --r: 12px;
            --r-lg: 18px;
            --shadow: 0 1px 4px rgba(12, 21, 36, .06), 0 4px 16px rgba(12, 21, 36, .08);
            --shadow-lg: 0 8px 32px rgba(12, 21, 36, .13);
        }

        body {
            font-family: var(--sans);
        }

        /* ── RESULT HERO ── */
        .result-hero {
            border-radius: 20px;
            padding: 48px 40px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 28px;
            flex-wrap: wrap;
            position: relative;
            overflow: hidden;
        }

        .result-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            background: radial-gradient(ellipse 60% 70% at 80% 50%, rgba(255, 255, 255, .35) 0%, transparent 70%);
        }

        .result-hero.success {
            background: linear-gradient(135deg, #DCFCE7 0%, #BBF7D0 100%);
            border: 1.5px solid var(--green-bd);
        }

        .result-hero.failure {
            background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
            border: 1.5px solid var(--red-bd);
        }

        .result-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
            position: relative;
            z-index: 1;
        }

        .result-icon.success {
            background: linear-gradient(135deg, #16A34A, #22C55E);
        }

        .result-icon.failure {
            background: linear-gradient(135deg, #DC2626, #EF4444);
        }

        .result-icon svg {
            width: 34px;
            height: 34px;
            color: #fff;
        }

        .result-text {
            position: relative;
            z-index: 1;
            flex: 1;
            min-width: 220px;
        }

        .result-status {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .10em;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .result-status.success {
            color: var(--green);
        }

        .result-status.failure {
            color: var(--red);
        }

        .result-title {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.025em;
            margin: 0 0 6px;
            color: var(--ink);
        }

        .result-meta {
            font-size: 13px;
            color: var(--muted);
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 10px;
        }

        .result-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .result-meta-item svg {
            width: 14px;
            height: 14px;
        }

        .result-actions {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1.5px solid rgba(0, 0, 0, .12);
            color: var(--ink2);
            padding: 10px 20px;
            border-radius: var(--r);
            font-family: var(--sans);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: box-shadow .18s, transform .14s;
            white-space: nowrap;
        }

        .btn-back:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-1px);
            color: var(--ink);
        }

        .btn-back svg {
            width: 14px;
            height: 14px;
        }

        .btn-rerun {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue);
            border: 1.5px solid var(--blue);
            color: #fff;
            padding: 10px 20px;
            border-radius: var(--r);
            font-family: var(--sans);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .18s, transform .14s;
            white-space: nowrap;
        }

        .btn-rerun:hover {
            background: #1750A8;
            transform: translateY(-1px);
        }

        .btn-rerun svg {
            width: 14px;
            height: 14px;
        }

        /* ── COMMAND SUMMARY ── */
        .cmd-summary {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            padding: 22px 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .cmd-summary-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: var(--blue-bg);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .cmd-summary-icon svg {
            width: 20px;
            height: 20px;
        }

        .cmd-summary-info {
            flex: 1;
        }

        .cmd-summary-name {
            font-family: var(--mono);
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
        }

        .cmd-summary-desc {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
        }

        .cmd-artisan-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 10px;
        }

        .artisan-chip {
            font-family: var(--mono);
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 7px;
            background: var(--blue-bg);
            border: 1px solid var(--blue-bd);
            color: var(--blue);
        }

        /* ── TERMINAL LOG CARD ── */
        .log-card {
            background: #0D1117;
            border-radius: var(--r-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            margin-bottom: 20px;
        }

        .log-card-bar {
            background: #161B22;
            border-bottom: 1px solid rgba(255, 255, 255, .07);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .log-win-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .log-win-dot-r {
            background: #FF5F57;
        }

        .log-win-dot-a {
            background: #FEBC2E;
        }

        .log-win-dot-g {
            background: #28C840;
        }

        .log-card-label {
            font-family: var(--mono);
            font-size: 12px;
            color: rgba(255, 255, 255, .3);
            margin-left: 4px;
        }

        .log-body {
            padding: 20px 24px;
            font-family: var(--mono);
            font-size: 12.5px;
            line-height: 1.8;
            max-height: 520px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, .1) transparent;
        }

        .log-body::-webkit-scrollbar {
            width: 5px;
        }

        .log-body::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .1);
            border-radius: 3px;
        }

        .log-line {
            display: flex;
            gap: 14px;
            padding: 1px 0;
        }

        .log-ts {
            color: rgba(255, 255, 255, .18);
            flex-shrink: 0;
            user-select: none;
        }

        .log-text {
            word-break: break-all;
        }

        .log-success .log-text {
            color: #3FB950;
        }

        .log-error .log-text {
            color: #F85149;
        }

        .log-warn .log-text {
            color: #D29922;
        }

        .log-info .log-text {
            color: #58A6FF;
        }

        .log-plain .log-text {
            color: #8B949E;
        }

        .log-muted .log-text {
            color: rgba(139, 148, 158, .5);
        }

        .log-empty {
            padding: 40px;
            text-align: center;
            color: rgba(255, 255, 255, .2);
            font-family: var(--mono);
            font-size: 12px;
        }

        /* ── LOG STATS ROW ── */
        .log-stats {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .log-stat-chip {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            border-radius: var(--r);
            border: 1.5px solid var(--border);
            background: var(--white);
            font-size: 12px;
            font-weight: 500;
            color: var(--ink2);
            box-shadow: var(--shadow);
        }

        .log-stat-chip svg {
            width: 14px;
            height: 14px;
        }

        .chip-green {
            border-color: var(--green-bd);
            color: var(--green);
            background: var(--green-bg);
        }

        .chip-red {
            border-color: var(--red-bd);
            color: var(--red);
            background: var(--red-bg);
        }

        .chip-blue {
            border-color: var(--blue-bd);
            color: var(--blue);
            background: var(--blue-bg);
        }

        /* ── MORE COMMANDS ── */
        .more-commands-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--muted);
            margin: 28px 0 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .more-commands-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .more-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        .more-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
            transition: box-shadow .2s, border-color .2s, transform .18s;
            box-shadow: var(--shadow);
        }

        .more-card:hover {
            box-shadow: var(--shadow-lg);
            border-color: rgba(29, 95, 196, .22);
            transform: translateY(-2px);
        }

        .more-card.danger-more:hover {
            border-color: var(--red-bd);
        }

        .more-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform .25s;
        }

        .more-card:hover .more-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .more-icon svg {
            width: 17px;
            height: 17px;
        }

        .more-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
        }

        .more-desc {
            font-size: 11px;
            color: var(--muted);
            margin-top: 2px;
        }

        /* Hidden forms */
        .hidden-form {
            display: none;
        }

        /* Animate in */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .result-hero {
            animation: slideUp .5s ease both;
        }

        .cmd-summary {
            animation: slideUp .5s .08s ease both;
        }

        .log-stats {
            animation: slideUp .5s .14s ease both;
        }

        .log-card {
            animation: slideUp .5s .20s ease both;
        }
    </style>
@endpush

@section('content')

    {{-- ═══ RESULT HERO ═══ --}}
    <div class="result-hero {{ $success ? 'success' : 'failure' }}">

        {{-- State icon --}}
        <div class="result-icon {{ $success ? 'success' : 'failure' }}">
            @if($success)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
            @else
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            @endif
        </div>

        {{-- Status text --}}
        <div class="result-text">
            <div class="result-status {{ $success ? 'success' : 'failure' }}">
                {{ $success ? '✔  Command Successful' : '✖  Command Failed' }}
            </div>
            <h2 class="result-title">{{ $meta['label'] }}</h2>
            <div class="result-meta">
                <span class="result-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    {{ $ranAt->format('d M Y, H:i:s') }}
                </span>
                <span class="result-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                    </svg>
                    {{ $duration }}ms
                </span>
                <span class="result-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                    {{ auth()->user()?->email ?? 'System' }}
                </span>
                <span class="result-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
                        <line x1="8" y1="21" x2="16" y2="21" />
                        <line x1="12" y1="17" x2="12" y2="21" />
                    </svg>
                    {{ strtoupper(app()->environment()) }}
                </span>
            </div>
        </div>

        {{-- Action buttons --}}
        <div class="result-actions">
            <a href="{{ route('admin.console.index') }}" class="btn-back">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="19" y1="12" x2="5" y2="12" />
                    <polyline points="12 19 5 12 12 5" />
                </svg>
                Back to Console
            </a>
            <a href="{{ route('home') }}" class="btn btn-info rounded-3">Back to homepage</a>
            @if(!$meta['danger'] || !app()->isProduction())
                <form method="POST" action="{{ route('admin.console.run', $key) }}">
                    @csrf
                    <button type="submit" class="btn-rerun">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                            <polyline points="23 4 23 10 17 10" />
                            <path d="M20.49 15a9 9 0 11-2.12-9.36L23 10" />
                        </svg>
                        Run Again
                    </button>
                </form>
            @endif
        </div>

    </div>

    {{-- ═══ COMMAND SUMMARY ═══ --}}
    <div class="cmd-summary">
        <div class="cmd-summary-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="4 17 10 11 4 5" />
                <line x1="12" y1="19" x2="20" y2="19" />
            </svg>
        </div>
        <div class="cmd-summary-info">
            <div class="cmd-summary-name">{{ $meta['label'] }}</div>
            <div class="cmd-summary-desc">{{ $meta['description'] }}</div>
            <div class="cmd-artisan-list">
                @foreach($meta['artisan'] as $artisan)
                    <code class="artisan-chip">php artisan {{ $artisan['cmd'] }}</code>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══ LOG STATS ═══ --}}
    @php
        $successLines = collect($logs)->where('type', 'success')->count();
        $errorLines = collect($logs)->where('type', 'error')->count();
        $totalLines = count($logs);
    @endphp
    <div class="log-stats">
        <div class="log-stat-chip chip-blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="8" y1="6" x2="21" y2="6" />
                <line x1="8" y1="12" x2="21" y2="12" />
                <line x1="8" y1="18" x2="21" y2="18" />
                <line x1="3" y1="6" x2="3.01" y2="6" />
                <line x1="3" y1="12" x2="3.01" y2="12" />
                <line x1="3" y1="18" x2="3.01" y2="18" />
            </svg>
            {{ $totalLines }} log lines
        </div>
        @if($successLines)
            <div class="log-stat-chip chip-green">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ $successLines }} successful
            </div>
        @endif
        @if($errorLines)
            <div class="log-stat-chip chip-red">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
                {{ $errorLines }} error{{ $errorLines > 1 ? 's' : '' }}
            </div>
        @endif
        <div class="log-stat-chip">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </svg>
            {{ $duration }}ms elapsed
        </div>
        <div class="log-stat-chip">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                <polyline points="14 2 14 8 20 8" />
            </svg>
            Logged to storage/logs
        </div>
    </div>

    {{-- ═══ TERMINAL LOG ═══ --}}
    <div class="log-card">
        <div class="log-card-bar">
            <div class="log-win-dot log-win-dot-r"></div>
            <div class="log-win-dot log-win-dot-a"></div>
            <div class="log-win-dot log-win-dot-g"></div>
            <span class="log-card-label">
                artisan@{{ request()->getHost() }} · {{ $ranAt->format('Y-m-d H:i:s') }}
            </span>
        </div>
        <div class="log-body" id="logBody">
            @if($logs)
                @foreach($logs as $log)
                    <div class="log-line log-{{ $log['type'] }}">
                        <span class="log-ts">{{ $ranAt->format('H:i:s') }}</span>
                        <span class="log-text">{{ $log['line'] }}</span>
                    </div>
                @endforeach
            @else
                <div class="log-empty">No output captured.</div>
            @endif
        </div>
    </div>

    {{-- ═══ OTHER COMMANDS (quick access) ═══ --}}
    <div class="more-commands-label">Other Commands</div>
    <div class="more-grid">
        @foreach($commands as $cmdKey => $cmd)
            @if($cmdKey !== $key)
                <form method="POST" action="{{ route('admin.console.run', $cmdKey) }}" class="hidden-form" id="mform-{{ $cmdKey }}">
                    @csrf</form>
                <div class="more-card {{ $cmd['danger'] ? 'danger-more' : '' }}"
                    onclick="{{ $cmd['danger'] ? "openMini('{$cmdKey}','" . addslashes($cmd['label']) . "')" : "document.getElementById('mform-{$cmdKey}').submit()" }}">
                    <div class="more-icon {{ $cmd['danger'] ? 'ci-red' : 'ci-blue' }}"
                        style="{{ $cmd['danger'] ? 'background:var(--red-bg);color:var(--red);' : 'background:var(--blue-bg);color:var(--blue);' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <polygon points="5 3 19 12 5 21 5 3" />
                        </svg>
                    </div>
                    <div>
                        <div class="more-name">{{ $cmd['label'] }}</div>
                        <div class="more-desc">{{ Str::limit($cmd['description'], 42) }}</div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- MINI DANGER CONFIRM (inline) --}}
    <div id="miniOverlay" style="position:fixed;inset:0;background:rgba(12,21,36,.5);backdrop-filter:blur(4px);
         z-index:1050;display:none;align-items:center;justify-content:center;" onclick="closeMini(event)">
        <div style="background:#fff;border-radius:20px;padding:32px;max-width:400px;width:90%;
           box-shadow:0 24px 64px rgba(12,21,36,.25);">
            <p style="font-size:14px;color:var(--ink2);margin-bottom:20px;font-weight:500;" id="miniMsg"></p>
            <div style="display:flex;gap:10px;justify-content:flex-end;">
                <button onclick="closeMini()" style="padding:8px 16px;border-radius:var(--r);
            border:1.5px solid var(--border);background:#fff;cursor:pointer;font-size:13px;">Cancel</button>
                <button id="miniConfirm" style="padding:8px 18px;border-radius:var(--r);
            background:var(--red);border:1.5px solid var(--red);color:#fff;cursor:pointer;font-size:13px;font-weight:600;">
                    Run
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Auto-scroll terminal to bottom
        const logBody = document.getElementById('logBody');
        if (logBody) logBody.scrollTop = logBody.scrollHeight;

        // Mini danger confirm
        let miniKey = null;
        function openMini(key, label) {
            miniKey = key;
            document.getElementById('miniMsg').textContent = 'Run "' + label + '"? This is a destructive action.';
            const overlay = document.getElementById('miniOverlay');
            overlay.style.display = 'flex';
        }
        function closeMini(e) {
            if (e && e.target !== document.getElementById('miniOverlay')) return;
            document.getElementById('miniOverlay').style.display = 'none';
            miniKey = null;
        }
        document.getElementById('miniConfirm').addEventListener('click', () => {
            if (miniKey) {
                document.getElementById('miniOverlay').style.display = 'none';
                document.getElementById('mform-' + miniKey)?.submit();
            }
        });
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMini(); });
    </script>
@endpush
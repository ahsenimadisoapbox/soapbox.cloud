<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SystemConsoleController extends Controller
{
    /**
     * All available commands with metadata.
     */
    private array $commands = [
        'migrate' => [
            'label'       => 'Database Migration',
            'description' => 'Run all pending database migrations',
            'artisan'     => [['cmd' => 'migrate', 'params' => ['--force' => true]]],
            'section'     => 'Database',
            'danger'      => false,
            'icon'        => 'database',
        ],
        'migrate-fresh' => [
            'label'       => 'Fresh Migration + Seed',
            'description' => 'Drop all tables, re-run migrations & seed — destructive!',
            'artisan'     => [
                ['cmd' => 'migrate:fresh', 'params' => ['--force' => true]],
                ['cmd' => 'db:seed',       'params' => ['--force' => true]],
            ],
            'section'     => 'Database',
            'danger'      => true,
            'icon'        => 'refresh',
        ],
        'clear-cache' => [
            'label'       => 'Clear All Cache',
            'description' => 'Flush cache, config, route and view caches',
            'artisan'     => [
                ['cmd' => 'cache:clear'],
                ['cmd' => 'config:clear'],
                ['cmd' => 'route:clear'],
                ['cmd' => 'view:clear'],
            ],
            'section'     => 'Cache & Config',
            'danger'      => false,
            'icon'        => 'trash',
        ],
        'optimize' => [
            'label'       => 'Optimize Application',
            'description' => 'Cache config, routes and views for performance',
            'artisan'     => [['cmd' => 'optimize']],
            'section'     => 'Cache & Config',
            'danger'      => false,
            'icon'        => 'bolt',
        ],
        'queue-restart' => [
            'label'       => 'Restart Queue Workers',
            'description' => 'Gracefully restart all queue worker processes',
            'artisan'     => [['cmd' => 'queue:restart']],
            'section'     => 'Queue & Storage',
            'danger'      => false,
            'icon'        => 'refresh',
        ],
        'storage-link' => [
            'label'       => 'Create Storage Link',
            'description' => 'Symlink public/storage → storage/app/public',
            'artisan'     => [['cmd' => 'storage:link', 'params' => ['--force' => true]]],
            'section'     => 'Queue & Storage',
            'danger'      => false,
            'icon'        => 'link',
        ],
    ];

    /**
     * Show the console dashboard.
     */
    public function index()
{
    $commands = $this->commands;

    $sections = [];
    foreach ($commands as $key => $cmd) {
        $sections[$cmd['section']][$key] = $cmd;  // string key preserved naturally
    }

    return view('console.index', compact('commands', 'sections'));
}

    /**
     * Run a specific command and render the result view.
     */
    public function run(Request $request, string $key)
    {
        if (!array_key_exists($key, $this->commands)) {
            abort(404, 'Unknown command.');
        }

        $meta      = $this->commands[$key];
        $startedAt = now();
        $logs      = [];
        $success   = false;
        $exitCode  = 0;

        /* ── Production guard for destructive commands ── */
        if ($meta['danger'] && app()->isProduction()) {
            $logs[] = ['type' => 'error', 'line' => "BLOCKED: '{$meta['label']}' is disabled in production."];

            Log::channel('daily')->warning("[SystemConsole] Dangerous command blocked in production", [
                'key'  => $key,
                'user' => auth()->user()?->email ?? 'unauthenticated',
                'ip'   => $request->ip(),
            ]);

            return view('console.result', [
                'key'       => $key,
                'meta'      => $meta,
                'success'   => false,
                'logs'      => $logs,
                'duration'  => 0,
                'ranAt'     => $startedAt,
                'commands'  => $this->commands,
            ]);
        }

        /* ── Run each artisan sub-command ── */
        try {
            foreach ($meta['artisan'] as $item) {
                $cmd    = $item['cmd'];
                $params = $item['params'] ?? [];

                $logs[] = ['type' => 'info', 'line' => "▶  Running: php artisan {$cmd}"];

                $exitCode = Artisan::call($cmd, $params);
                $output   = trim(Artisan::output());

                if ($output) {
                    foreach (explode("\n", $output) as $line) {
                        $line = trim($line);
                        if (!$line) continue;
                        $type = $this->classifyLine($line);
                        $logs[] = ['type' => $type, 'line' => $line];
                    }
                } else {
                    $logs[] = ['type' => 'muted', 'line' => '   (no output)'];
                }

                if ($exitCode !== 0) {
                    $logs[] = ['type' => 'error', 'line' => "   Exit code: {$exitCode}"];
                    throw new \RuntimeException("Command [{$cmd}] returned exit code {$exitCode}.");
                }

                $logs[] = ['type' => 'success', 'line' => "✔  Completed: {$cmd}"];
            }

            $success  = true;
            $duration = round($startedAt->diffInMilliseconds(now()));

            Log::channel('daily')->info("[SystemConsole] {$meta['label']} — SUCCESS", [
                'key'        => $key,
                'duration_ms'=> $duration,
                'user'       => auth()->user()?->email ?? 'unauthenticated',
                'ip'         => $request->ip(),
                'output'     => collect($logs)->pluck('line')->implode("\n"),
            ]);

        } catch (\Throwable $e) {
            $success  = false;
            $duration = round($startedAt->diffInMilliseconds(now()));

            $logs[] = ['type' => 'error', 'line' => ''];
            $logs[] = ['type' => 'error', 'line' => '✖  Exception: ' . $e->getMessage()];

            foreach (explode("\n", $e->getTraceAsString()) as $i => $traceLine) {
                if ($i >= 8) { $logs[] = ['type' => 'muted', 'line' => '   … (trace truncated)']; break; }
                $logs[] = ['type' => 'muted', 'line' => '   ' . $traceLine];
            }

            Log::channel('daily')->error("[SystemConsole] {$meta['label']} — FAILED", [
                'key'        => $key,
                'error'      => $e->getMessage(),
                'trace'      => $e->getTraceAsString(),
                'duration_ms'=> $duration,
                'user'       => auth()->user()?->email ?? 'unauthenticated',
                'ip'         => $request->ip(),
            ]);
        }

        return view('console.result', compact(
            'key', 'meta', 'success', 'logs', 'duration', 'startedAt',
        ) + ['commands' => $this->commands, 'ranAt' => $startedAt]);
    }

    /**
     * Classify an output line for colouring.
     */
    private function classifyLine(string $line): string
    {
        $lower = strtolower($line);
        if (str_contains($lower, 'error') || str_contains($lower, 'fail') || str_contains($lower, 'exception')) {
            return 'error';
        }
        if (str_contains($lower, 'warn') || str_contains($lower, 'deprecated')) {
            return 'warn';
        }
        if (str_contains($lower, 'migrat') || str_contains($lower, 'creat') || str_contains($lower, 'done')) {
            return 'success';
        }
        if (str_contains($line, '...') || str_contains($lower, 'running')) {
            return 'info';
        }
        return 'plain';
    }
}
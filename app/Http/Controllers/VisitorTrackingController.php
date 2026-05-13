<?php

namespace App\Http\Controllers;

use App\Models\VisitorPageVisit;
use App\Models\VisitorSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class VisitorTrackingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        if (Str::startsWith($request->input('page_path', ''), '/admins')) {
            return response()->json(['tracked' => false], 204);
        }

        $data = $request->validate([
            'session_key' => 'required|string|max:64',
            'visit_key' => 'required|string|max:64',
            'event' => 'required|string|in:pageview,heartbeat,unload',
            'page_title' => 'nullable|string|max:255',
            'page_path' => 'required|string|max:255',
            'page_url' => 'required|string|max:2000',
            'referrer' => 'nullable|string|max:2000',
            'duration_seconds' => 'nullable|integer|min:0|max:86400',
            'device_name' => 'nullable|string|max:255',
            'device_type' => 'nullable|string|max:40',
            'browser' => 'nullable|string|max:80',
            'os' => 'nullable|string|max:80',
            'language' => 'nullable|string|max:40',
            'timezone' => 'nullable|string|max:100',
            'screen_size' => 'nullable|string|max:40',
        ]);

        $now = now();
        $duration = (int) ($data['duration_seconds'] ?? 0);
        $session = VisitorSession::firstOrCreate(
            ['session_key' => $data['session_key']],
            [
                'ip_address' => $request->ip(),
                'country_code' => $request->header('CF-IPCountry') ?: null,
                'device_name' => $data['device_name'] ?? null,
                'device_type' => $data['device_type'] ?? null,
                'browser' => $data['browser'] ?? null,
                'os' => $data['os'] ?? null,
                'language' => $data['language'] ?? null,
                'timezone' => $data['timezone'] ?? null,
                'screen_size' => $data['screen_size'] ?? null,
                'user_agent' => Str::limit((string) $request->userAgent(), 1000, ''),
                'first_seen_at' => $now,
            ]
        );

        $session->fill([
            'ip_address' => $request->ip(),
            'country_code' => $request->header('CF-IPCountry') ?: $session->country_code,
            'device_name' => $data['device_name'] ?? $session->device_name,
            'device_type' => $data['device_type'] ?? $session->device_type,
            'browser' => $data['browser'] ?? $session->browser,
            'os' => $data['os'] ?? $session->os,
            'language' => $data['language'] ?? $session->language,
            'timezone' => $data['timezone'] ?? $session->timezone,
            'screen_size' => $data['screen_size'] ?? $session->screen_size,
            'user_agent' => Str::limit((string) $request->userAgent(), 1000, ''),
            'last_seen_at' => $now,
        ]);

        $visit = VisitorPageVisit::firstOrNew(['visit_key' => $data['visit_key']]);
        $isNewVisit = ! $visit->exists;

        $visit->fill([
            'visitor_session_id' => $session->id,
            'page_title' => $data['page_title'] ?? null,
            'page_path' => $data['page_path'],
            'page_url' => $data['page_url'],
            'referrer' => $data['referrer'] ?? null,
            'duration_seconds' => max($duration, (int) $visit->duration_seconds),
            'started_at' => $visit->started_at ?: Carbon::createFromTimestampMs((int) $request->input('started_at_ms', now()->getTimestampMs())),
            'last_seen_at' => $now,
        ]);
        $visit->save();

        $session->page_views_count += $isNewVisit ? 1 : 0;
        $session->total_duration_seconds = max((int) $session->total_duration_seconds, VisitorPageVisit::where('visitor_session_id', $session->id)->sum('duration_seconds'));
        $session->save();

        return response()->json(['tracked' => true], 204);
    }
}

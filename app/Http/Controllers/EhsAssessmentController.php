<?php

namespace App\Http\Controllers;

use App\Models\EhsAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Mail\EhsThankYouMail;
use Illuminate\Support\Facades\Mail;

class EhsAssessmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            // Contact info
            'name'                       => 'required|string|max:255',
            'email'                      => 'required|email|max:255',
            'phone'                      => 'nullable|string|max:30',
            'company'                    => 'nullable|string|max:255',
            'country'                    => 'nullable|string|max:100',
            'role'                       => 'nullable|string|max:255',
            'schedule'                   => 'nullable|date',

            'ai_summary' => 'nullable|string',
            'risk_score' => 'nullable|integer',
            'ehs_readiness_score' => 'nullable|integer',
            'assessment_answers' => 'nullable|string',

            // Section 1 — Organisation
            'industry'                   => 'nullable|string|max:255',
            'employees'                  => 'nullable|string|max:255',
            'contractors'                => 'nullable|string|max:255',
            'sites'                      => 'nullable|string|max:255',
            'distribution'               => 'nullable|string|max:255',
            'mobile'                     => 'nullable|string|max:255',

            // Section 2 — Current Tools & Reporting
            'tool'                       => 'nullable|string|max:255',
            'reporting'                  => 'nullable|string|max:255',
            'report_time'                => 'nullable|string|max:255',
            'deadline_tracking'          => 'nullable|string|max:255',
            'ownership'                  => 'nullable|string|max:255',
            'review_frequency'           => 'nullable|string|max:255',
            'leadership_view'            => 'nullable|string|max:255',

            // Section 3 — Risk & Issues
            'risk_issue'                 => 'nullable|string|max:255',
            'problems'                   => 'nullable|array',
            'problems.*'                 => 'nullable|string|max:255',
            'readiness'                  => 'nullable|string|max:255',
            'audit_readiness'            => 'nullable|string|max:255',
            'issue_visibility'           => 'nullable|string|max:255',

            // Section 3 (new) — External Audit Preparation
            'external_audit_preparation' => 'nullable|string',

            // Section 4 — Compliance
            'frameworks'                 => 'nullable|array',
            'frameworks.*'               => 'nullable|string|max:255',
            'fines'                      => 'nullable|string|max:255',
            'compliance_confidence'      => 'nullable|string|max:255',

            // Section 5 — Priorities & Next Steps
            'priority'                   => 'nullable|array',
            'priority.*'                 => 'nullable|string|max:255',
            'esg'                        => 'nullable|string|max:255',
            'evaluation_timeline'        => 'nullable|string|max:255',
            'pilot_interest'             => 'nullable|string|max:255',
            'success'                    => 'nullable|string',

            // Captcha
            // 'g-recaptcha-response'       => 'required',
        ]);

        // reCAPTCHA verification
        // $captchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        //     'secret'   => env('NOCAPTCHA_SECRET'),
        //     'response' => $request->input('g-recaptcha-response'),
        //     'remoteip' => $request->ip(),
        // ]);

        // if (!data_get($captchaResponse->json(), 'success')) {
        //     return back()->withErrors(['danger' => 'Captcha verification failed']);
        // }

        // Cast array fields to JSON for storage
        $saveData = $data;

        foreach (['problems', 'frameworks', 'priority'] as $arrayField) {

            if (isset($saveData[$arrayField]) && is_array($saveData[$arrayField])) {

                $saveData[$arrayField] = json_encode($saveData[$arrayField]);

            }
        }

        $saveData['ai_summary'] =
            $data['ai_summary'] ?? null;

        $saveData['risk_score'] =
            $data['risk_score'] ?? null;

        $saveData['ehs_readiness_score'] =
            $data['ehs_readiness_score'] ?? null;

        $saveData['assessment_answers'] =
            isset($data['assessment_answers'])
                ? json_decode($data['assessment_answers'], true)
                : null;

        EhsAssessment::create($saveData);

        Mail::to($data['email'])->send(new EhsThankYouMail($data));

        return redirect()->route('thank.you', ['source' => 'ehs']);
    }
}
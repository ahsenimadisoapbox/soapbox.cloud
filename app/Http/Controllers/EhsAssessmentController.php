<?php

namespace App\Http\Controllers;

use App\Models\EhsAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

use App\Mail\EhsThankYouMail;
use Illuminate\Support\Facades\Mail;

class EhsAssessmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            // Contact info
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:30',
            'schedule' => 'nullable|date',
            'company' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',

            // Section 1
            'industry' => 'nullable|string|max:255',
            'employees' => 'nullable|string|max:255',
            'sites' => 'nullable|string|max:255',
            'distribution' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'contractors' => 'nullable|string|max:255',

            // Section 2
            'tool' => 'nullable|string|max:255',
            'reporting' => 'nullable|string|max:255',
            'report_time' => 'nullable|string|max:255',
            'ownership' => 'nullable|string|max:255',
            'review_frequency' => 'nullable|string|max:255',
            'leadership_view' => 'nullable|string|max:255',

            // Section 3
            'problems' => 'nullable|array',
            'problems.*' => 'nullable|string|max:255',
            'readiness' => 'nullable|string|max:255',
            'risk_issue' => 'nullable|string|max:255',
            'audit_readiness' => 'nullable|string|max:255',
            'issue_visibility' => 'nullable|string|max:255',

            // Section 4
            'frameworks' => 'nullable|array',
            'frameworks.*' => 'nullable|string|max:255',
            'fines' => 'nullable|string|max:255',
            'deadline_tracking' => 'nullable|string|max:255',
            'compliance_confidence' => 'nullable|string|max:255',

            // Section 5
            'esg' => 'nullable|string|max:255',
            'priority' => 'nullable|array',
            'priority.*' => 'nullable|string|max:255',
            'evaluation_timeline' => 'nullable|string|max:255',
            'pilot_interest' => 'nullable|string|max:255',
            'success' => 'nullable|string',

            'g-recaptcha-response' => 'required'
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('NOCAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!data_get($response->json(), 'success')) {
            return back()->withErrors(['danger' => 'Captcha verification failed']);
        }

        EhsAssessment::create($data);

        Mail::to($data['email'])->send(new EhsThankYouMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Assessment saved successfully'
        ]);
    }
}

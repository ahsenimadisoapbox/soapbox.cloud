<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EhsAssessment extends Model
{
    protected $fillable = [
        // Contact
        'name',
        'email',
        'phone',
        'company',
        'country',
        'role',
        'schedule',

        'ai_summary',
'risk_score',
'ehs_readiness_score',
'assessment_answers',


        // Section 1
        'industry',
        'employees',
        'contractors',
        'sites',
        'distribution',
        'mobile',

        // Section 2
        'tool',
        'reporting',
        'report_time',
        'deadline_tracking',
        'ownership',
        'review_frequency',
        'leadership_view',

        // Section 3
        'risk_issue',
        'problems',
        'readiness',
        'audit_readiness',
        'issue_visibility',
        'external_audit_preparation',

        // Section 4
        'frameworks',
        'fines',
        'compliance_confidence',

        // Section 5
        'priority',
        'esg',
        'evaluation_timeline',
        'pilot_interest',
        'success',
    ];

    protected $casts = [
    'problems' => 'array',
    'frameworks' => 'array',
    'priority' => 'array',

    'assessment_answers' => 'array',
    ];
}
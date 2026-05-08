<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EhsAssessment extends Model
{
   protected $fillable = [
        // Contact info
        'name',
        'email',
        'country',
        'phone',
        'schedule',
        'company',
        'role',

        // Section 1
        'industry',
        'employees',
        'sites',
        'distribution',
        'mobile',
        'contractors',

        // Section 2
        'tool',
        'reporting',
        'report_time',
        'ownership',
        'review_frequency',
        'leadership_view',

        // Section 3
        'problems',
        'readiness',
        'risk_issue',
        'audit_readiness',
        'issue_visibility',

        // Section 4
        'frameworks',
        'fines',
        'deadline_tracking',
        'compliance_confidence',

        // Section 5
        'esg',
        'priority',
        'evaluation_timeline',
        'pilot_interest',
        'success',
    ];

    protected $casts = [
        'problems' => 'array',
        'frameworks' => 'array',
        'priority' => 'array',
        'schedule' => 'date',
    ];
}
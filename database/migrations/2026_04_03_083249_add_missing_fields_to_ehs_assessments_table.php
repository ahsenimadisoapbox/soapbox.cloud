<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            // Contact fields
            if (!Schema::hasColumn('ehs_assessments', 'company')) {
                $table->string('company')->nullable()->after('schedule');
            }

            if (!Schema::hasColumn('ehs_assessments', 'role')) {
                $table->string('role')->nullable()->after('company');
            }

            // Section 1
            if (!Schema::hasColumn('ehs_assessments', 'distribution')) {
                $table->string('distribution')->nullable()->after('sites');
            }

            if (!Schema::hasColumn('ehs_assessments', 'contractors')) {
                $table->string('contractors')->nullable()->after('mobile');
            }

            // Section 2
            if (!Schema::hasColumn('ehs_assessments', 'report_time')) {
                $table->string('report_time')->nullable()->after('reporting');
            }

            if (!Schema::hasColumn('ehs_assessments', 'ownership')) {
                $table->string('ownership')->nullable()->after('report_time');
            }

            if (!Schema::hasColumn('ehs_assessments', 'review_frequency')) {
                $table->string('review_frequency')->nullable()->after('ownership');
            }

            if (!Schema::hasColumn('ehs_assessments', 'leadership_view')) {
                $table->string('leadership_view')->nullable()->after('review_frequency');
            }

            // Section 3
            if (!Schema::hasColumn('ehs_assessments', 'risk_issue')) {
                $table->string('risk_issue')->nullable()->after('readiness');
            }

            if (!Schema::hasColumn('ehs_assessments', 'audit_readiness')) {
                $table->string('audit_readiness')->nullable()->after('risk_issue');
            }

            if (!Schema::hasColumn('ehs_assessments', 'issue_visibility')) {
                $table->string('issue_visibility')->nullable()->after('audit_readiness');
            }

            // Section 4
            if (!Schema::hasColumn('ehs_assessments', 'deadline_tracking')) {
                $table->string('deadline_tracking')->nullable()->after('fines');
            }

            if (!Schema::hasColumn('ehs_assessments', 'compliance_confidence')) {
                $table->string('compliance_confidence')->nullable()->after('deadline_tracking');
            }

            // Section 5
            if (!Schema::hasColumn('ehs_assessments', 'evaluation_timeline')) {
                $table->string('evaluation_timeline')->nullable()->after('priority');
            }

            if (!Schema::hasColumn('ehs_assessments', 'pilot_interest')) {
                $table->string('pilot_interest')->nullable()->after('evaluation_timeline');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            $columns = [
                'company',
                'role',
                'distribution',
                'contractors',
                'report_time',
                'ownership',
                'review_frequency',
                'leadership_view',
                'risk_issue',
                'audit_readiness',
                'issue_visibility',
                'deadline_tracking',
                'compliance_confidence',
                'evaluation_timeline',
                'pilot_interest',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('ehs_assessments', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};

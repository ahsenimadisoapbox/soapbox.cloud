<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            // Only add columns that don't already exist
            if (!Schema::hasColumn('ehs_assessments', 'industry')) {
                $table->string('industry')->nullable()->after('company');
            }
            if (!Schema::hasColumn('ehs_assessments', 'employees')) {
                $table->string('employees')->nullable()->after('industry');
            }
            if (!Schema::hasColumn('ehs_assessments', 'contractors')) {
                $table->string('contractors')->nullable()->after('employees');
            }
            if (!Schema::hasColumn('ehs_assessments', 'tool')) {
                $table->string('tool')->nullable()->after('contractors');
            }
            if (!Schema::hasColumn('ehs_assessments', 'reporting')) {
                $table->string('reporting')->nullable()->after('tool');
            }
            if (!Schema::hasColumn('ehs_assessments', 'deadline_tracking')) {
                $table->string('deadline_tracking')->nullable()->after('reporting');
            }
            if (!Schema::hasColumn('ehs_assessments', 'report_time')) {
                $table->string('report_time')->nullable()->after('deadline_tracking');
            }
            if (!Schema::hasColumn('ehs_assessments', 'risk_issue')) {
                $table->string('risk_issue')->nullable()->after('report_time');
            }
            if (!Schema::hasColumn('ehs_assessments', 'external_audit_preparation')) {
                $table->text('external_audit_preparation')->nullable()->after('risk_issue');
            }
            if (!Schema::hasColumn('ehs_assessments', 'priority')) {
                $table->json('priority')->nullable()->after('external_audit_preparation');
            }
            if (!Schema::hasColumn('ehs_assessments', 'name')) {
                $table->string('name')->nullable()->after('priority');
            }
            if (!Schema::hasColumn('ehs_assessments', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
            if (!Schema::hasColumn('ehs_assessments', 'company')) {
                $table->string('company')->nullable()->after('email');
            }
            if (!Schema::hasColumn('ehs_assessments', 'phone')) {
                $table->string('phone')->nullable()->after('company');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            $table->dropColumn([
                'external_audit_preparation',
            ]);
            // Only drop columns that were newly added (skip pre-existing ones like name, email, etc.)
        });
    }
};
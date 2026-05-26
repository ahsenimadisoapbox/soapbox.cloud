<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('ehs_assessments', function (Blueprint $table) {

        $table->longText('ai_summary')->nullable();

        $table->integer('risk_score')->nullable();

        $table->integer('ehs_readiness_score')->nullable();

        $table->json('assessment_answers')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            //
        });
    }
};

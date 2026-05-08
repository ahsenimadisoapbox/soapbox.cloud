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
        Schema::create('ehs_assessments', function (Blueprint $table) {
            $table->id();

            // STEP 1
            $table->string('industry')->nullable();
            $table->string('employees')->nullable();
            $table->string('sites')->nullable();

            // STEP 2
            $table->string('tool')->nullable();
            $table->string('reporting')->nullable();
            $table->string('mobile')->nullable();

            // STEP 3
            $table->json('problems')->nullable(); // multiple
            $table->string('readiness')->nullable();

            // STEP 4
            $table->json('frameworks')->nullable(); // multiple
            $table->string('fines')->nullable();

            // STEP 5
            $table->string('esg')->nullable();
            $table->json('priority')->nullable(); // multiple
            $table->text('success')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ehs_assessments');
    }
};

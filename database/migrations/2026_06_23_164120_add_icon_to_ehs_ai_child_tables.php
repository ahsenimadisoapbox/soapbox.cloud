<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ehs_ai_help_items', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('description');
        });

        Schema::table('ehs_ai_business_outcomes', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('ehs_ai_help_items', function (Blueprint $table) {
            $table->dropColumn('icon');
        });

        Schema::table('ehs_ai_business_outcomes', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
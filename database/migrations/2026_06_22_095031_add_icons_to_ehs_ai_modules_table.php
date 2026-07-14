<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ehs_ai_modules', function (Blueprint $table) {

            $table->string('help_icon')->nullable()->after('human_loop_description');

            $table->string('business_outcome_icon')->nullable()->after('help_icon');

        });
    }

    public function down(): void
    {
        Schema::table('ehs_ai_modules', function (Blueprint $table) {

            $table->dropColumn([
                'help_icon',
                'business_outcome_icon'
            ]);

        });
    }
};
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
        Schema::table('ehs_ai_modules', function (Blueprint $table) {

            $table->string('banner_image')->nullable()->after('slug');

            $table->string('ai_assist_image')->nullable()->after('banner_image');

        });
    }

    public function down(): void
    {
        Schema::table('ehs_ai_modules', function (Blueprint $table) {

            $table->dropColumn([
                'banner_image',
                'ai_assist_image'
            ]);

        });
    }
};

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
        Schema::create('ehs_ai_modules', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('slug')->unique();

            /*
            |--------------------------------------------------------------------------
            | Hero
            |--------------------------------------------------------------------------
            */

            $table->string('hero_title')->nullable();

            $table->string('hero_headline')->nullable();

            $table->longText('hero_copy')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Why AI Assist
            |--------------------------------------------------------------------------
            */

            $table->longText('why_ai_assist')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Human In Loop
            |--------------------------------------------------------------------------
            */

            $table->longText('human_loop_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CTA
            |--------------------------------------------------------------------------
            */

            $table->string('cta_title')->nullable();

            $table->text('cta_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->text('meta_keywords')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Misc
            |--------------------------------------------------------------------------
            */

            $table->integer('sort_order')->default(0);

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ehs_ai_modules');
    }
};

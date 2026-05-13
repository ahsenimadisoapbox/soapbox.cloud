<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visitor_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_key', 64)->unique();
            $table->string('ip_address', 45)->nullable()->index();
            $table->string('country_code', 10)->nullable()->index();
            $table->string('device_name')->nullable();
            $table->string('device_type', 40)->nullable()->index();
            $table->string('browser', 80)->nullable();
            $table->string('os', 80)->nullable();
            $table->string('language', 40)->nullable();
            $table->string('timezone', 100)->nullable();
            $table->string('screen_size', 40)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('first_seen_at')->nullable()->index();
            $table->timestamp('last_seen_at')->nullable()->index();
            $table->unsignedInteger('total_duration_seconds')->default(0);
            $table->unsignedInteger('page_views_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_sessions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('demo_requests', function (Blueprint $table) {

            // Rename existing columns
            $table->renameColumn('first_name', 'full_name');
            $table->renameColumn('company', 'company_name');
            $table->renameColumn('role', 'primary_interest');
            $table->renameColumn('challenge', 'notes');

            // Remove unused columns
            $table->dropColumn([
                'last_name',
                'phone',
                'country',
                'source'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('demo_requests', function (Blueprint $table) {

            $table->renameColumn('full_name', 'first_name');
            $table->renameColumn('company_name', 'company');
            $table->renameColumn('primary_interest', 'role');
            $table->renameColumn('notes', 'challenge');

            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('source')->nullable();
        });
    }
};
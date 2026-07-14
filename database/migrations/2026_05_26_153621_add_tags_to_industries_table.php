<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('industries', function (Blueprint $table) {

            $table->json('module_tags')->nullable();

            $table->json('compliance_tags')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('industries', function (Blueprint $table) {

            $table->dropColumn([
                'module_tags',
                'compliance_tags'
            ]);

        });
    }
};
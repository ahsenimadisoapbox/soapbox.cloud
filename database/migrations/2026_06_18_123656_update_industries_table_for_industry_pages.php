<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('industries', function (Blueprint $table) {

            $table->string('headline')->nullable()->after('title');

            $table->longText('operations_reality')->nullable()->after('description');

            $table->longText('did_you_know')->nullable();

            $table->longText('legacy_system_intro')->nullable();

            $table->json('scaling_silo_trap')->nullable();

            $table->longText('key_takeaways')->nullable();

            $table->longText('common_programmes')->nullable();

            $table->string('banner_image')->nullable();

            $table->json('module_ids')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('industries', function (Blueprint $table) {

            $table->dropColumn([
                'headline',
                'operations_reality',
                'did_you_know',
                'legacy_system_intro',
                'scaling_silo_trap',
                'key_takeaways',
                'common_programmes',
                'banner_image',
                'module_ids'
            ]);
        });
    }
};
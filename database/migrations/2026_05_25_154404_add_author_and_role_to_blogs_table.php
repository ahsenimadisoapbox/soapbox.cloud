<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->string('author')
                  ->nullable()
                  ->after('mobile_content');

            $table->string('role')
                  ->nullable()
                  ->after('author');

        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->dropColumn([
                'author',
                'role'
            ]);

        });
    }
};
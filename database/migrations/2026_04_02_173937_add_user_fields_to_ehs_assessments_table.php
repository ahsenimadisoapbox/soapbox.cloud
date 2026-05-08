<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('schedule')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ehs_assessments', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'country', 'phone', 'schedule']);
        });
    }
};

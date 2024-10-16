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
        Schema::create('student_systems', function (Blueprint $table) {
            $table->id();
            $table->string('education_name');
            $table->string('band_name');
            $table->string('ranking');
            $table->string('grading_data');
            $table->string('person_name');
            $table->string('person_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_systems');
    }
};

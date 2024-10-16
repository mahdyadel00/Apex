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
        Schema::create('vision_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vision_id')->references('id')->on('visions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('lang_id')->constrained('languages')->onDelete('cascade');
            $table->text('training_courses');
            $table->text('quality_policy');
            $table->text('social_responsibility');
            $table->text('communication');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_data');
    }
};

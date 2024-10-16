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
        Schema::create('setting_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->references('id')->on('settings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('lang_id')->constrained('languages')->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_data');
    }
};

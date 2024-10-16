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
        Schema::create('privacy_policy_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('privacy_policy_id')->references('id')->on('privacy_policies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('lang_id')->constrained('languages')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_policy_data');
    }
};

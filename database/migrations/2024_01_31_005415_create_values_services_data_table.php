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
        Schema::create('values_services_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('values_services_id')->references('id')->on('values_services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('lang_id')->constrained('languages')->onDelete('cascade');
            $table->string("title");
            $table->text("description")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values_services_data');
    }
};

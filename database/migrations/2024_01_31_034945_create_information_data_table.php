<?php

use App\Models\Information;
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
        Schema::create('information_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Information::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('information_data');
    }
};

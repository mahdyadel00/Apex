<?php

use App\Models\Sector;
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
        Schema::create('sector_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sector::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('lang_id')->constrained('languages')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sector_data');
    }
};

<?php

use App\Models\Center;
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
        Schema::create('center_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Center::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('lang_id')->constrained('languages')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_dates');
    }
};

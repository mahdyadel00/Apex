<?php

use App\Models\Country;
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
        Schema::create('step_systems', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('center_name');
            $table->string('controller_name');
            $table->string('phone');
            $table->string('lab_name');
            $table->string('id_number');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('grades');
            $table->string('writing_grade')->nullable();
            $table->string('reading_grade')->nullable();
            $table->string('listening_grade')->nullable();
            $table->enum('estimates', ['fluent' , 'good' , 'acceptable'])->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_systems');
    }
};

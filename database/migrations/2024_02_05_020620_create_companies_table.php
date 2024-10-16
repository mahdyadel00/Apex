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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->ForeignIdFor(Sector::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->enum('type' , ['step' , 'student' , 'certificate']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

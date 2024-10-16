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
        Schema::create('certificate_integrities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('manager_name');
            $table->string('person_name');
            $table->string('person_email');
            $table->string('person_phone');
            $table->string('id_number');
            $table->string('gscore');
            $table->string('country_destination');
            $table->string('destination_port');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_integrities');
    }
};

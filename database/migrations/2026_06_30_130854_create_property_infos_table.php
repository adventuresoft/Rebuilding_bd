<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('people')->cascadeOnDelete();
            $table->string('land_ownership')->nullable();
            $table->string('house_ownership')->nullable();
            $table->string('vehicle_ownership')->nullable();
            $table->text('property_notes')->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_infos');
    }
};

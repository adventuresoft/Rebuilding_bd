<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatment_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('people')->cascadeOnDelete();
            $table->string('hospital_name')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('treatment_status')->nullable();
            $table->date('admission_date')->nullable();
            $table->date('release_date')->nullable();
            $table->text('treatment_details')->nullable();
            $table->decimal('medical_expenses', 12, 2)->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatment_infos');
    }
};

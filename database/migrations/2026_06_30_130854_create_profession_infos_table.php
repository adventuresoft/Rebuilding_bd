<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profession_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('people')->cascadeOnDelete();
            $table->string('profession')->nullable();
            $table->string('workplace')->nullable();
            $table->string('designation')->nullable();
            $table->string('experience_years')->nullable();
            $table->text('profession_notes')->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profession_infos');
    }
};

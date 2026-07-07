<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('freedom_fighter_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('people')->cascadeOnDelete();
            $table->boolean('is_freedom_fighter_family')->default(false);
            $table->string('relation_to_freedom_fighter')->nullable();
            $table->string('certificate_number')->nullable();
            $table->text('freedom_fighter_notes')->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('freedom_fighter_infos');
    }
};

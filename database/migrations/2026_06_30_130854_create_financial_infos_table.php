<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('financial_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('people')->cascadeOnDelete();
            $table->decimal('monthly_income', 12, 2)->nullable();
            $table->string('income_source')->nullable();
            $table->string('financial_support')->nullable();
            $table->string('bank_account')->nullable();
            $table->text('financial_notes')->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_infos');
    }
};

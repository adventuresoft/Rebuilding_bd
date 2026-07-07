<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_reg_no')->nullable();
            $table->string('mobile')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();

            // Present Address
            $table->unsignedBigInteger('present_division_id')->nullable();
            $table->unsignedBigInteger('present_district_id')->nullable();
            $table->unsignedBigInteger('present_thana_id')->nullable();
            $table->unsignedBigInteger('present_union_id')->nullable();
            $table->string('present_ward')->nullable();
            $table->string('present_village')->nullable();

            // Same as present flag
            $table->boolean('same_as_present')->default(false);

            // Permanent Address
            $table->unsignedBigInteger('permanent_division_id')->nullable();
            $table->unsignedBigInteger('permanent_district_id')->nullable();
            $table->unsignedBigInteger('permanent_thana_id')->nullable();
            $table->unsignedBigInteger('permanent_union_id')->nullable();
            $table->string('permanent_ward')->nullable();
            $table->string('permanent_village')->nullable();

            // Photo
            $table->string('picture')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};

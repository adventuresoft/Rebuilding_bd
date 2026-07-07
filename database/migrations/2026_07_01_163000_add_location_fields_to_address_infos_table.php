<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('address_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('permanent_division_id')->nullable();
            $table->unsignedBigInteger('permanent_district_id')->nullable();
            $table->unsignedBigInteger('permanent_thana_id')->nullable();
            $table->unsignedBigInteger('permanent_post_office_id')->nullable();
            $table->unsignedBigInteger('permanent_union_id')->nullable();
            $table->string('permanent_village')->nullable();
            $table->string('permanent_ward')->nullable();
            $table->string('permanent_road')->nullable();
            $table->string('permanent_house')->nullable();
            $table->string('permanent_house_bn')->nullable();

            $table->boolean('same_as_permanent')->default(false);

            $table->unsignedBigInteger('present_division_id')->nullable();
            $table->unsignedBigInteger('present_district_id')->nullable();
            $table->unsignedBigInteger('present_thana_id')->nullable();
            $table->unsignedBigInteger('present_post_office_id')->nullable();
            $table->unsignedBigInteger('present_union_id')->nullable();
            $table->string('present_village')->nullable();
            $table->string('present_ward')->nullable();
            $table->string('present_road')->nullable();
            $table->string('present_house')->nullable();
            $table->string('present_house_bn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('address_infos', function (Blueprint $table) {
            $table->dropColumn([
                'permanent_division_id', 'permanent_district_id', 'permanent_thana_id', 'permanent_post_office_id', 'permanent_union_id',
                'permanent_village', 'permanent_ward', 'permanent_road', 'permanent_house', 'permanent_house_bn',
                'same_as_permanent',
                'present_division_id', 'present_district_id', 'present_thana_id', 'present_post_office_id', 'present_union_id',
                'present_village', 'present_ward', 'present_road', 'present_house', 'present_house_bn'
            ]);
        });
    }
};

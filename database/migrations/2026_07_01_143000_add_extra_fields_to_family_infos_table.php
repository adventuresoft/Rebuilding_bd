<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('family_infos', function (Blueprint $table) {
            $table->string('family_member_type')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_bangla')->nullable();
            $table->string('father_live_status')->nullable();
            $table->string('father_id')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_bangla')->nullable();
            $table->string('mother_live_status')->nullable();
            $table->string('mother_id')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_name_bangla')->nullable();
            $table->string('spouse_nid')->nullable();
            $table->date('married_date')->nullable();
            $table->boolean('have_children')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('family_infos', function (Blueprint $table) {
            $table->dropColumn([
                'family_member_type',
                'father_name',
                'father_name_bangla',
                'father_live_status',
                'father_id',
                'mother_name',
                'mother_name_bangla',
                'mother_live_status',
                'mother_id',
                'marital_status',
                'spouse_name',
                'spouse_name_bangla',
                'spouse_nid',
                'married_date',
                'have_children',
            ]);
        });
    }
};

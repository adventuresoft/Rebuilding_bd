<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('education_infos', function (Blueprint $table) {
            $table->longText('education_details')->nullable()->after('study_status');
        });
    }

    public function down(): void
    {
        Schema::table('education_infos', function (Blueprint $table) {
            $table->dropColumn('education_details');
        });
    }
};

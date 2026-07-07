<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('july_fighter_infos', function (Blueprint $table) {
            $table->date('incident_date')->nullable()->after('fighter_type');
            $table->date('date_of_death')->nullable()->after('incident_date');
        });
    }

    public function down(): void
    {
        Schema::table('july_fighter_infos', function (Blueprint $table) {
            $table->dropColumn(['incident_date', 'date_of_death']);
        });
    }
};

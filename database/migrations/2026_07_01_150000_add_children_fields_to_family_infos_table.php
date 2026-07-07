<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('family_infos', function (Blueprint $table) {
            $table->unsignedInteger('number_of_boys')->nullable()->default(0);
            $table->unsignedInteger('number_of_girls')->nullable()->default(0);
            $table->longText('children_details')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('family_infos', function (Blueprint $table) {
            $table->dropColumn(['number_of_boys', 'number_of_girls', 'children_details']);
        });
    }
};

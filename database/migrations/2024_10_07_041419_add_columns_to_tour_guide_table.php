<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->boolean('isCertified')->default(false)->after('languages');
            $table->boolean('highRatings')->default(false);
            $table->boolean('responsiveGuide')->default(false);
            $table->boolean('no_of_slots')->default(false);
            $table->boolean('response_time')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->dropColumn('isCertified');
            $table->dropColumn('highRatings');
            $table->dropColumn('responsiveGuide');
        });
    }
};

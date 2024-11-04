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
        Schema::table('guide_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('emirates_id')->nullable()->after('guide_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guide_descriptions', function (Blueprint $table) {
            $table->dropColumn('emirates_id');
        });
    }
};

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
            $table->decimal('price', 8, 2)->nullable()->after('status');
            $table->integer('experience')->nullable()->after('price');
            $table->string('languages')->nullable()->after('experience');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('experience');
            $table->dropColumn('languages');
        });
    }
};

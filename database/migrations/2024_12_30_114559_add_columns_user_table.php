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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->string('date_of_birth')->nullable()->after('image');
            $table->string('nationality')->nullable()->after('image');
            $table->string('gender')->nullable()->after('image');
            $table->string('address')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('nationality');
            $table->dropColumn('gender');
            $table->dropColumn('address');
        });
    }
};

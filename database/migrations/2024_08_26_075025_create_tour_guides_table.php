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
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('license_id')->unique();
            $table->decimal('hourly_price', 8, 2);
            $table->string('country');
            $table->string('nationality');
            $table->boolean('verified')->default(false);
            $table->boolean('approved')->default(false);
            $table->boolean('suspended')->default(false);
            $table->timestamps();
        });
        // Schema::create('tour_guides', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_guides');
    }
};

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
        Schema::create('available_timings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_guide_id');
            $table->dateTime('available_from');
            $table->dateTime('available_to');
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('tour_guide_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Schema::create('available_timings', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_timings');
    }
};

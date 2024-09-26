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
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_guide_tour_id');
            $table->unsignedBigInteger('tourist_id');
            $table->dateTime('booked_at');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('tour_guide_tour_id')->references('id')->on('tour_guide_tour')->onDelete('cascade');
            $table->foreign('tourist_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Schema::create('tour_bookings', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_bookings');
    }
};

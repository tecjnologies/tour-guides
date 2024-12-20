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
        Schema::create('places_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_id'); 
            $table->string('image');
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places_gallery', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
        });

        Schema::dropIfExists('places_gallery');
    }
};

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
        Schema::create('guide_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guide_id'); // Change to unsignedBigInteger
            $table->boolean('isCertified')->default(false);
            $table->boolean('highRatings')->default(false);
            $table->boolean('responsiveGuide')->default(false);
            $table->boolean('no_of_slots')->default(false);
            $table->boolean('response_time')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guide_descriptions', function (Blueprint $table) {
            $table->dropForeign(['guide_id']); // Drop foreign key first
        });

        Schema::dropIfExists('guide_descriptions'); // Then drop the table
    }
};

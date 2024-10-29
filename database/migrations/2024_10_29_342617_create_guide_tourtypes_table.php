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
        Schema::create('guide_tourtypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained('guides')->onDelete('cascade');
            $table->foreignId('tourtype_id')->constrained('tourtypes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guide_tourtypes', function (Blueprint $table) {
            // Dropping foreign keys before dropping the columns
            $table->dropForeign(['guide_id']);
            $table->dropForeign(['tourtype_id']);
        });

        Schema::dropIfExists('guide_tourtypes'); // Drop the table itself
    }
};
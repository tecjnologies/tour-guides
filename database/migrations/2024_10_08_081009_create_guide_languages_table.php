<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('guide_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained('guides')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guide_languages', function (Blueprint $table) {
            // Dropping foreign keys before dropping the columns
            $table->dropForeign(['guide_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('guide_languages'); // Drop the table itself
    }
};

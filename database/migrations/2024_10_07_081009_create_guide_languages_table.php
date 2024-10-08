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
        Schema::create('guide_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('guide_id');
            $table->unsignedInteger('language_id');
            $table->timestamps();

            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('guide_languages', function (Blueprint $table) {
            
            $table->dropForeign(['guide_id']);
            $table->dropForeign(['language_id']);
            
            $table->dropColumn('guide_id');
            $table->dropColumn('language_id');


        });
    }
};

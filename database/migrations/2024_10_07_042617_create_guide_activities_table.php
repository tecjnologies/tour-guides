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
        Schema::create('guide_activities', function (Blueprint $table) {
        
            $table->id();
            $table->unsignedInteger('guide_id');
            $table->unsignedInteger('activity_id');
            $table->timestamps();

            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guide_activities', function (Blueprint $table) {
            
            $table->dropForeign(['guide_id']);
            $table->dropColumn('guide_id');
            
            $table->dropForeign(['activity_id']);
            $table->dropColumn('activity_id');


        });
    }
};

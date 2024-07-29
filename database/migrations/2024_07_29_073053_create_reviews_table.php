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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('comments')->nullable();
            $table->integer('thumps_up')->nullable(); 
            $table->integer('heart')->nullable(); 
            $table->integer('rating')->nullable(); 
            $table->string('status')->nullable(); 
            $table->unsignedBigInteger('review_image_id')->nullable(); 

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

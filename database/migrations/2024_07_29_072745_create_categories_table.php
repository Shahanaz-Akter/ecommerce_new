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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->unsignedBigInteger('category_level')->nullable();
            $table->unsignedBigInteger('category_image_id')->nullable();

             // Foreign key constraint (assuming ImageFiles table exists)
            //  $table->foreign('category_image_id')->references('id')->on('image_files')->onDelete('set null');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // ['attr_name_id', 'attribute_value', 'quantity', 'image_id','product_id',  'variation_id']
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->string('attribute_value')->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};








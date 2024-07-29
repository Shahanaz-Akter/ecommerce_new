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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('added_by')->nullable();
            $table->text('description')->nullable();
            $table->integer('total_qty');
            $table->string('discount_type')->nullable();
            $table->string('slug')->nullable();
            $table->string('collection')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('product_id_type')->nullable();
            $table->string('stock_status')->nullable(); 
            $table->string('rating')->nullable();
            $table->dateTime('discount_start_date')->nullable();
            $table->dateTime('discount_end_date')->nullable();
            $table->string('tags')->nullable();
            $table->integer('min_qty')->nullable();
            $table->string('featured')->nullable();
            $table->string('trendy')->nullable();
            $table->string('new_arrival')->nullable();
            $table->string('todays_deal')->nullable();
            $table->unsignedBigInteger('thumbnail_image_id')->nullable();
            $table->unsignedBigInteger('gallery_image_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('review_id')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image_link')->nullable();
            $table->string('shipping_type')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('product_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

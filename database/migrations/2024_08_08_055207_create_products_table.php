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

         // protected $fillable =['name', 'added_by', 'description','total_qty', 'discount_type', 'discount', 'slug', 'stock_status', 'status', 'discount_start_date', 'discount_end_date',  'tags', 'min_qty' , 'featured', 'trendy', 'new_arrival', 'todays_deal', 'category_id', 'brand_id',  'vendor_id', 'meta_title', 'meta_description', 'shipping_type', 'shipping_cost', ];

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('added_by')->nullable();
            $table->text('description')->nullable();
            $table->integer('total_qty')->default(0)->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('discount')->nullable();
            $table->string('slug')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('discount_start_date')->nullable();
            $table->dateTime('discount_end_date')->nullable();
            $table->string('tags')->nullable()->nullable();
            $table->integer('min_qty')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('trendy')->nullable();
            $table->boolean('new_arrival')->nullable();
            $table->boolean('todays_deal')->nullable();
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('shipping_type')->nullable();
            $table->integer('shipping_cost')->nullable();
            
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name', 'added_by', 'description','total_qty', 'discount_type', 'slug', 'collection', 'product_id', 'product_id_type', 'stock_status', 'rating', 'discount_start_date', 'discount_end_date', 'tags', 'min_qty' , 'featured', 'trendy', 'new_arrival', 'todays_deal', 'thumbnail_image_id', 'gallery_image_id', 'category_id', 'brand_id', 'review_id', 'vendor_name', 'meta_title', 'meta_description', 'image_link', 'shipping_type', 'shipping_cost', 'product_type'];

}

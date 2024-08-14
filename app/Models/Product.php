<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'added_by', 'description', 'total_qty', 'discount_type', 'discount', 'slug', 'stock_status', 'status', 'discount_start_date', 'discount_end_date',  'tags', 'min_qty', 'featured', 'trendy', 'new_arrival', 'todays_deal', 'category_id', 'brand_id',  'vendor_id', 'unit_id','meta_title', 'meta_description', 'shipping_type', 'shipping_cost',];


    public function variant()
    {
        return $this->hasMany(Variant::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}

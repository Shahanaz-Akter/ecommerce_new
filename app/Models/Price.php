<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_price', 'regular_price', 'sale_price','unit_id', 'product_id', 'variation_id'];


    public function unit(){
            return $this->belongsTo(Unit::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
}

}




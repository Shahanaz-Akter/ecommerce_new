<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_id', 'attribute_value', 'quantity', 'product_id'];


    public function attribute()
    {
        return $this->belongsTo((Attribute::class)) ;
    }


    public function attributeValue(){
       return  $this->belongsTo((AttributeValue::class), 'attribute_value');
    }


    public function product(){
        return  $this->belongsTo((Product::class));
     }



}

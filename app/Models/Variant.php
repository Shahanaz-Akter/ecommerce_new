<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
   	
    protected $fillable = ['attribute_id', 'attribute_value', 'quantity', 'image_id','product_id'];

}

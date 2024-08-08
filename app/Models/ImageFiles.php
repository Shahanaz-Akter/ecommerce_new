<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageFiles extends Model
{
    use HasFactory;

    protected $fillable = ['original_name', 'absolute_path', 'date', 'file_size', 'extension', 'is_images', 'product_id', 'is_variation'];


    public function user(){

        return $this->hasOne(User::class);
        
    }

    public function brand(){

        return $this->hasOne(Brand::class, 'brand_image_id');
        
    }

    public function category()
    {
        return $this->hasOne(Category::class);

    }

}

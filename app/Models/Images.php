<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    

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



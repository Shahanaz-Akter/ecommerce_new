<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_category_id', 'category_level', 'category_image_id'];

    public function imagefile()
    {
        return $this->belongsTo(ImageFiles::class, 'category_image_id', 'id');
    }

    public function childerns()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

   

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}

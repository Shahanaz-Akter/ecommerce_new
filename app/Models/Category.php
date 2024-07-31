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

    // one to many main relation
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    // Recursive relationship
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }


}

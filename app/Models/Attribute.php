<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_name', 'slug'];

    function values()
    {

        return $this->hasMany(AttributeValue::class);
    }

    function variant()
    {
        return $this->hasOne(Variant::class);
    }
}

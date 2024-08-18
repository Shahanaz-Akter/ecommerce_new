<?php

namespace App\Models;

use App\Models\Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'description', 'image_id'];


    public function brandImage()
    {

        return $this->belongsTo(Images::class, 'image_id', 'id');
    }
}

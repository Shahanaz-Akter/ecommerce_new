<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppInfo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'logo_img_id', 'short_description', 'phone', 'email'];


    public function logoImage()
    {
        return $this->belongsTo(Images::class, 'logo_img_id', 'id');
    }
}

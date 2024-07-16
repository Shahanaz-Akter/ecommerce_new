<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageFiles extends Model
{
    use HasFactory;

    protected $fillable = ['original_name', 'absolute_path', 'date', 'file_size', 'extension'];


    public function user(){
        return $this->belongsTo(ImageFiles::class, 'image_files_id');
    }
}

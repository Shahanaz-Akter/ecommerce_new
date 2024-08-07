<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable =['name','comments' ,'thumps_up','heart', 'rating', 'status','review_image_id', 'product_id'];

}



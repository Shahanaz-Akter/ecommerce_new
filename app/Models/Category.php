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


//     Women
//         -clothes 
//             -Tops
//                -half sleeve tops(product)
//                -full sleeve tops(product)
//             -Shirt
//             -half sleeve shirt
//             -full sleeve shirt
//         -Footwear
//           -scart_pants
//               -scart1
//               -scart2
//           -under_pant
//               -under1
//               -under2
//         -accessories
//             -Ladies accessories
//                    -watch
       
//    Electronics
//         -Computer 
//             -Samsung
//                 -corei3 computer
//                 -corei5 computer
//             -Sony
//                -corei11 computer

//         -Laptop
//           -Hp
//             -corei11 laptop
//             -corei7 laptop
//           -Lenovo
//              -corei14 laptop
//           -Dell
//         -Mouse
//           -3D Mouse
    

   


}

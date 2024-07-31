<?php

namespace App\Http\Controllers\Product;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function Products()
    {
        $products = Product::get();
        // dd($products);
        return view('backend.products.products', compact('products'));
    }


    public function addProduct()
    {
        // $cate = Category::with('childrens')->where('parent_category_id', 0)->get();

        $all_cates = Category::where('parent_category_id', 0)
        ->with('allChildren')
        ->orderBy('name') 
        ->get();
        
        return $all_cates;

        $brands = Brand::get();
        $categories = Category::get();
        $colors = Color::get();
        $attributes = Attribute::get();
        $units = Unit::get();
        $vendors = Vendor::get();

        $parent_cate = Category::select('id', 'name')->get();

        return view('backend.products.add-product', compact('brands', 'categories', 'colors', 'attributes', 'units', 'vendors', 'parent_cate', 'all_cates'));
    }

}

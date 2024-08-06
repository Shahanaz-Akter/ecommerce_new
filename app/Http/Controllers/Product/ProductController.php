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

        // $all_cates = Category::where('parent_category_id', 0)
        // ->with('allChildren')
        // ->orderBy('name') 
        // ->get();

        $all_cates = Category::where('parent_category_id', 0)
            ->with('allChildren')
            ->get();

        // return $all_cates;

        $brands = Brand::get();
        $categories = Category::get();
        $colors = Color::get();
        $attributes = Attribute::get();
        $units = Unit::get();
        $vendors = Vendor::get();

        $parent_cate = Category::get();

        return view('backend.products.add-product', compact('brands', 'categories', 'colors', 'attributes', 'units', 'vendors', 'parent_cate', 'all_cates'));
    }


    public function postProduct(Request $request)
    {

        $all = $request->all();
        dd($all);
        // product_name
        // total_qty
        // brand_id
        // unit_id
        //  discount_type
        //   stock_status
        //    product_rating
        //     status
        //      start_date 
        //      end_date
        //       min_qty 
        //       product_images
        //        product_description
        // p_regular_price 
        //  p_sale_price
        //   p_purchase_price 
        //   p_quantity

        // shipping_type
        //  product_type
        //   product_type_number
        // sub_category 
        // parent_category 
        // added_by 
        // vendor_id 
        // collection 
        // slug 
        // tags

        //  review_name[] 
        //  rating[] 
        //   heart[] 
        //   status[] 
        //   thumbs_up[] 
        //   review_img 
        //   comments[] 
        // attribute_ids[] 
        // attribute_values[]
        //   variant_images[] 
        //   buying_prices[]  
        //   sale_prices[] 
        //   Purchase_prices[] 
        //   quantity[]
        // meta_title 
        // meta_image_link
        //  meta_description


        $uploadedImages = $request->file('images');

        $imagePaths = [];
        if ($uploadedImages) {
            foreach ($uploadedImages as $image) {

                echo $image;
            }
        }
    }
}

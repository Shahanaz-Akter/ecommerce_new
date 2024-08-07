<?php

namespace App\Http\Controllers\Product;

use Exception;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Price;
use App\Models\Review;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ImageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\ImageFile;

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
        // dd($all);
        try {

            // DB::beginTransaction();
            $product =  new Product();
            $product->name = $request->product_name;
            $product->category_id = $request->parent_category_id;

            $product->total_qty = $request->total_qty;
            $product->brand_id = $request->brand_id;

            $product->discount_type = $request->discount_type;
            $product->discount = $request->discount;
            $product->stock_status = $request->stock_status;
            $product->status = $request->status;
           
            $product->discount_start_date = $request->start_date;
            $product->discount_end_date = $request->end_date;
            $product->min_qty = $request->min_qty;
            $product->description = $request->product_description;
         
            $product->shipping_type = $request->shipping_type;
            $product->shipping_cost = $request->shipping_cost;
           
            $product->added_by = Auth::user()->username;
            $product->vendor_id = $request->vendor_id;
            $product->slug = $request->slug;
            $product->tags = $request->tags;
            
            // $product->product_name = $request->attribute_ids;
            // $product->product_name = $request->attribute_values;
            // $product->product_name = $request->variant_images;
            // $product->product_name = $request->buying_prices;
            // $product->product_name = $request->sale_prices;
            // $product->product_name = $request->quantity;

            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            dd(500);
            $product->save();

            $product_images_arr = [];
            $productImages = $request->file('product_images');
            // dd($productImages);

            if ($productImages != null && count($productImages) > 0) {

                foreach ($productImages as $image) {

                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $uniqueName = uniqid() . '.' . $extension;
                    $fileSizeInBytes = $image->getSize();
                    $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                    $relativePath = '/uploads/' . $uniqueName;

                    $image->move(public_path('uploads'), $uniqueName);

                    $image_model =  new ImageFiles();
                    $image_model->original_name = $originalName;
                    $image_model->absolute_path = $relativePath;
                    $image_model->extension = $extension;
                    $image_model->file_size = $file_size;
                    $image_model->save();

                    $product_images_arr[] = $image_model->id; ////here each of the product_images id will be stored
                }
            }
            // dd( $product_images_arr);

            $reviewNames = $request->review_name;
            $ratings = $request->rating;
            $hearts = $request->heart;
            $statuses = $request->status;
            $comments = $request->comments;
            $thumps_ups = $request->thumps_up;

            // $count = count($reviewNames);
            $review_images = $request->file('review_img');

            $review_images_arr = [];

            if ($review_images != null && count($review_images) > 0) {

                foreach ($review_images as $image) {

                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $uniqueName = uniqid() . '.' . $extension;
                    $fileSizeInBytes = $image->getSize();
                    $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                    $relativePath = '/uploads/' . $uniqueName;

                    $image->move(public_path('uploads'), $uniqueName);

                    $image_model =  new ImageFiles();
                    $image_model->original_name = $originalName;
                    $image_model->absolute_path = $relativePath;
                    $image_model->extension = $extension;
                    $image_model->file_size = $file_size;
                    $image_model->save();

                    $review_images_arr[] = $image_model->id;
                }
            }

            $review_arr = []; //here each of the reviews id will be stored

            for ($j = 0; $j < count($reviewNames); $j++) {

                $review = new Review();

                $review->name = $reviewNames[$j];
                $review->rating = $ratings[$j];
                $review->heart = $hearts[$j];
                $review->status = $statuses[$j];
                $review->comments = $comments[$j];
                $review->thumps_up = $thumps_ups[$j];
                $review->review_image_id = $review_images_arr[$j];
                $review->product_id = $product->product_id;


                $review->save();

                $review_arr[] = $review->id;
            }

            dd($review_arr);

            // $product->review_id = $review->id;
            // $category =  new Category();
            // $category->name = $request->sub_category;
            // $category->parent_category_id = $request->parent_category;
            // $category->category_level = rand(0, 100);
            // $category->save();

            $isFirstImage = true;
            foreach ($product_images_arr  as $img) {

                if ($isFirstImage) {

                    $product->thumbnail_image_id =  $img->id;
                    $isFirstImage = false;
                } else {
                    $product->gallery_image_id =  $img->id;
                }
                // $product->save();
            }

            $variant_images = $request->file('variant_images');

            $variant_images_arr = [];

            if ($variant_images != null && count($variant_images) > 0) {

                foreach ($variant_images as $image) {

                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $uniqueName = uniqid() . '.' . $extension;
                    $fileSizeInBytes = $image->getSize();
                    $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                    $relativePath = '/uploads/' . $uniqueName;

                    $image->move(public_path('uploads'), $uniqueName);

                    $image_model =  new ImageFiles();
                    $image_model->original_name = $originalName;
                    $image_model->absolute_path = $relativePath;
                    $image_model->extension = $extension;
                    $image_model->file_size = $file_size;
                    $image_model->save();

                    $variant_images_arr[] = $image_model->id;
                }
            }


            $variant_ids = $request->variant_ids;
            $variant_values = $request->variant_values;
            $variant_buying_price = $request->buying_prices;
            $variant_sale_price = $request->sale_prices;
            $variant_purchase_price = $request->purchase_prices;
            $variant_quantities = $request->quantities;


            $variant_ids = [];

            for ($i = 0; $i < count($variant_ids); $i++) {

                $variant = new Variant();

                $variant->name = $variant_ids[$i];
                $variant->rating = $variant_values[$i];
                $variant->status = $variant_images_arr[$i];
                $variant->image = $variant_buying_price[$i];
                $variant->image = $variant_sale_price[$i];
                $variant->image = $variant_purchase_price[$i];
                $variant->image = $variant_quantities[$i];
                $variant->save();

                $variant_ids[] = $variant->id;
            }


            $price =  new Price();
            $price->regular_price = $request->p_regular_price;
            $price->sale_price = $request->p_sale_price;
            $price->purchase_price = $request->p_purchase_price ? $request->p_purchase_price : 0.00;
            $price->unit_id = $request->unit_id;
            $price->product_id = $product->id;
            // $price->variation_id = $variation->id;
            $price->save();


            DB::commit();
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    private function humanReadableFileSize($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $unitIndex = 0;

        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }

        return round($size, $precision) . ' ' . $units[$unitIndex];
    }
}

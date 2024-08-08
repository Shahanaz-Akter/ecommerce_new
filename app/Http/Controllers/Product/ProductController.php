<?php

namespace App\Http\Controllers\Product;

use Exception;
use Carbon\Carbon;
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
use Illuminate\Support\Facades\Log;
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
            DB::beginTransaction();

            $review = new Review();
            $variant = new Variant();
            $price =  new Price();

            // product value stored
            $product = new Product();
            $product->name = $request->product_name;
            $product->category_id = $request->parent_category_id;
            $product->total_qty = $request->total_qty;
            $product->brand_id = $request->brand_id;
            $product->discount_type = $request->discount_type;
            $product->discount = $request->discount;
            $product->stock_status = $request->stock_status;
            $product->status = $request->status;
            $product->discount_start_date = $request->start_date ? Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d H:i:s') : null;
            $product->discount_end_date = $request->end_date ? Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d H:i:s') : null;

            $product->min_qty = $request->min_qty;
            $product->description = $request->product_description;
            $product->shipping_type = $request->shipping_type;
            $product->shipping_cost = $request->shipping_cost;
            $product->added_by = Auth::user()->username;
            $product->vendor_id = $request->vendor_id;
            $product->slug = $request->product_name . '_' . rand(10, 100);
            $product->tags = $request->tags;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->save();

            $productImages = $request->file('product_images');
            // dd($productImages);

            // products images storing into imagefiles model
            if ($productImages != null && count($productImages) > 0) {

                $isFirstImage = true;

                foreach ($productImages as $index => $image) {

                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $uniqueName = uniqid() . '.' . $extension;
                    $fileSizeInBytes = $image->getSize();
                    $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                    $relativePath = '/uploads/' . $uniqueName;

                    $image->move(public_path('uploads'), $uniqueName);

                    if ($isFirstImage) {
                        $image_model =  new ImageFiles();
                        $image_model->original_name = $originalName;
                        $image_model->absolute_path = $relativePath;
                        $image_model->extension = $extension;
                        $image_model->file_size = $file_size;

                        // $image_model->is_images = 0;
                        $image_model->is_images = ($index === 0) ? 0 : 1;

                        $image_model->product_id = $product->id;
                        $image_model->save();
                        $isFirstImage = false;
                    } else {
                        $image_model =  new ImageFiles();
                        $image_model->original_name = $originalName;
                        $image_model->absolute_path = $relativePath;
                        $image_model->extension = $extension;
                        $image_model->file_size = $file_size;

                        $image_model->is_images = 1;
                        $image_model->product_id = $product->id;
                        $image_model->save();
                    }
                }
            }

            // price data stored for simple product

            $price->purchase_price = $request->p_regular_price;
            $price->regular_price = $request->p_purchase_price;
            $price->sale_price = $request->p_sale_price;

            $price->unit_id = $request->unit_id;
            $price->product_id = $product->id;
            $price->save();

            // review value stored
            $reviewNames = $request->review_name ?? [];
            $ratings = $request->review_rating ?? [];
            $hearts = $request->review_heart ?? [];
            $statuses = $request->review_status ?? [];
            $comments = $request->comments ?? [];
            $thumps_ups = $request->thumps_up ?? [];


            $review_images = $request->file('review_images');
            $reviews_img_arr = [];

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

                    $reviews_img_arr[] = $image_model->id;
                }
            }

            dd(count($reviewNames) > 0 && count($reviewNames) === count($ratings) &&
                count($ratings) === count($hearts) && count($hearts) === count($statuses) &&
                count($statuses) === count($comments)
                && count($comments) === count($thumps_ups));

            // Check if the arrays are not empty and have the same length
            if (
                count($reviewNames) > 0 && count($reviewNames) === count($ratings) &&
                count($ratings) === count($hearts) && count($hearts) === count($statuses) &&
                count($statuses) === count($comments)
                && count($comments) === count($thumps_ups)
            ) {
                // Loop through each review
                for ($j = 0; $j < count($reviewNames); $j++) {

                    $review->name = $reviewNames[$j];
                    $review->rating = $ratings[$j];
                    $review->heart = $hearts[$j];
                    $review->status = $statuses[$j];
                    $review->comments = $comments[$j];
                    $review->thumps_up = $thumps_ups[$j];

                    if (isset($reviews_img_arr[$j])) {
                        $review->review_image_id = $reviews_img_arr[$j];
                    }

                    $review->product_id = $product->id;

                    $review->save();
                }
            }

            // variations stored model
            $variant_images = $request->file('attribute_images');


            $variations_img_arr = [];

            if ($variant_images != null && count($variant_images) > 0) {

                foreach ($variant_images as $image) {

                    $isFirstImage = true;

                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $uniqueName = uniqid() . '.' . $extension;
                    $fileSizeInBytes = $image->getSize();
                    $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                    $relativePath = '/uploads/' . $uniqueName;

                    $image->move(public_path('uploads'), $uniqueName);

                    if ($isFirstImage) {
                        $image_model =  new ImageFiles();
                        $image_model->original_name = $originalName;
                        $image_model->absolute_path = $relativePath;
                        $image_model->extension = $extension;
                        $image_model->file_size = $file_size;

                        $image_model->is_variation = 1;
                        $image_model->is_images = 0;

                        $image_model->product_id = $product->id;
                        $image_model->save();

                        $isFirstImage = false;

                        $variations_img_arr[] = $image_model->id;
                    } else {
                        $image_model =  new ImageFiles();
                        $image_model->original_name = $originalName;
                        $image_model->absolute_path = $relativePath;
                        $image_model->extension = $extension;
                        $image_model->file_size = $file_size;

                        $image_model->is_variation = 1;
                        $image_model->is_images = 1;
                        $image_model->product_id = $product->id;
                        $image_model->save();
                        $variations_img_arr[] = $image_model->id;
                    }
                }
            }
            $attribute_ids = $request->attribute_ids ?? [];
            $attribute_values = $request->attribute_values ?? [];
            $attribute_quantities = $request->attribute_quantities ?? [];

            $attribute_purchase_prices = $request->attribute_Purchase_prices ?? [];
            $attribute_regular_prices = $request->attribute_regular_prices ?? [];
            $attribute_sale_prices = $request->attribute_sale_prices ?? [];


            if (count($attribute_ids) > 0  && count($attribute_ids) === count($attribute_values) && count($attribute_values) === count($attribute_quantities)) {

                for ($k = 0; $k < count($attribute_ids); $k++) {


                    $variant->attribute_id = $attribute_ids[$k];
                    $variant->attribute_value = $attribute_values[$k];
                    $variant->quantity = $attribute_quantities[$k];

                    if (isset($variations_img_arr[$k])) {
                        $variant->image_id = $variations_img_arr[$k];
                    }

                    $variant->product_id = $product->id;

                    // $variant->attribute_purchase_price = $attribute_purchase_price[$k];
                    // $variant->attribute_sale_price = $attribute_sale_price[$k];
                    // $variant->attribute_regular_price = $attribute_regular_price[$k];

                    $variant->save();
                }
            }


            // price data stored for variation products
            // dd($attribute_purchase_prices, $attribute_regular_prices,   $attribute_sale_prices);
            if (
                count($attribute_purchase_prices) > 0 && count($attribute_purchase_prices) === count($attribute_regular_prices) &&
                count($attribute_regular_prices) === count($attribute_sale_prices)
            ) {
                for ($l = 0; $l < count($attribute_purchase_prices); $l = $l + 1) {


                    $price->purchase_price = $attribute_purchase_prices[$l];
                    $price->regular_price = $attribute_regular_prices[$l];
                    $price->sale_price = $attribute_sale_prices[$l];

                    $price->unit_id = $request->unit_id;
                    $price->product_id = $product->id;
                    $price->variation_id = $variant->id;
                    $price->save();
                }
            }

            DB::commit();

            return redirect()->route('products');
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

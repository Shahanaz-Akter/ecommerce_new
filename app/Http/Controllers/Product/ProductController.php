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


    public function data()
    {
        // $validData=  $request->validate([
        //     'name' => 'required|string|max:255',
        //     'total_qty' => 'required|integer',
        //     'stock_status' => 'required|string',
        //     'status' => 'required|string|max:255',
        //     'min_qty' => 'required|integer',
        //     'shipping_cost' => 'required|string',
        //     'tags' => 'required|string|max:255',
        //     'product_images' => 'required|file',
        // ], [
        //     'name.required' => 'Product Name is required.',
        //     'total_qty.required' => 'Total Quantity is required.',
        //     'total_qty.integer' => 'Total Quantity will be integer.',
        //     'stock_status.required' => 'Stock Status is required.',
        //     'status.required' => 'Status is required.',
        //     'min_qty.required' => 'Minimum Quantity is required.',
        //     'shipping_cost.required' => 'Shipping Cost is required.',
        //     'tags.required' => 'Tags are required.',
        //     'product_images.required' => 'Product Images are required.',
        // ]);

        // $variant_group_array = $request->variant_group;

        // $variantsArr = [];

        // for ($k = 0; $k < $maxVariation; $k++) {

        //     $isAvaialbeVariationData = $attribute_ids[$k] || $attribute_values[$k] || $attribute_quantities[$k] ||  $variant_images[$k];

        //     if ($isAvaialbeVariationData) {

        //         $variant = new Variant();
        //         $variant->attribute_id = $attribute_ids[$k];
        //         $variant->attribute_value = $attribute_values[$k];
        //         $variant->quantity = $attribute_quantities[$k];
        //         $variant->product_id = $product->id;
        //         $variant->save();

        //         $variantsArr = $variant->id;

        //         if ($variant_group_array != null && count($variant_group_array) > 0) {

        //             for ($p = 0; $p < count($variant_group_array); $p++) {

        //                 for ($t = 0; $t < count($variant_group_array[$t]); $t++) {

        //                     $isFirstImage = true;

        //                     $originalName = $variant_group_array[$t]->getClientOriginalName();
        //                     $extension = $variant_group_array[$t]->getClientOriginalExtension();
        //                     $uniqueName = uniqid() . '.' . $extension;
        //                     $fileSizeInBytes = $variant_group_array[$t]->getSize();
        //                     $file_size = $this->humanReadableFileSize($fileSizeInBytes);
        //                     $relativePath = '/uploads/' .  $uniqueName;

        //                     $image->move(public_path('uploads'), $uniqueName);

        //                     if ($isFirstImage) {
        //                         $image_model =  new ImageFiles();
        //                         $image_model->original_name = $originalName;
        //                         $image_model->absolute_path = $relativePath;
        //                         $image_model->extension = $extension;
        //                         $image_model->file_size = $file_size;

        //                         $image_model->is_variation = 1;
        //                         $image_model->is_images = 0;

        //                         $image_model->product_id = $product->id;
        //                         $image_model->variant_id = $variant->id;

        //                         $image_model->save();

        //                         $isFirstImage = false;
        //                     } else {
        //                         $image_model =  new ImageFiles();
        //                         $image_model->original_name = $originalName;
        //                         $image_model->absolute_path = $relativePath;
        //                         $image_model->extension = $extension;
        //                         $image_model->file_size = $file_size;

        //                         $image_model->is_variation = 1;
        //                         $image_model->is_images = 1;
        //                         $image_model->product_id = $product->id;
        //                         $image_model->save();
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        // end variantions



        //storing variation images
        // dd('start');

        // $variantImg = $request->variant_images;

        // for ($k = 0; $k < $maxVariation; $k++) {

        //     $isAvaialbeVariationData = $attribute_ids[$k] || $attribute_values[$k] || $attribute_quantities[$k] ||  $variantImg[$k];

        //     if ($isAvaialbeVariationData) {

        //         $variant = new Variant();
        //         $variant->attribute_id = $attribute_ids[$k];
        //         $variant->attribute_value = $attribute_values[$k];
        //         $variant->quantity = $attribute_quantities[$k];
        //         $variant->product_id = $product->id;
        //         $variant->save();

        //         // dd($variantImg[$i]);

        //         if ($variantImg != null && count($variantImg) > 0) {

        //             $originalName = $variantImg[$k];
        //             $extension = $variantImg[$k]->getClientOriginalExtension();
        //             $uniqueName = uniqid() . '.' . $extension;
        //             $fileSizeInBytes = $variantImg[$k]->getSize();


        //             $file_size = $this->humanReadableFileSize($fileSizeInBytes);
        //             $relativePath = '/uploads/' . $uniqueName;

        //             $variantImg[$k]->move(public_path('uploads'), $uniqueName);

        //             $image_model =  new ImageFiles();
        //             $image_model->original_name = $originalName;
        //             $image_model->absolute_path = $relativePath;
        //             $image_model->extension = $extension;
        //             $image_model->file_size = $file_size;

        //             $image_model->is_variation = 1;
        //             $image_model->is_images = 0;

        //             $image_model->product_id = $product->id;
        //             $image_model->variant_id = $variant->id;
        //             $image_model->save();
        //         }
        //     }
        // }

        // dd('end');
        // end variations stored model

        // $fileData = $request->variant_group; //variation images array here

        // $Imagefiles = $request->filesInput; //variation images array here
        // dd($Imagefiles);

        // dd(json_decode($fileData));
        // dd($fileData[0]);
        // return json_decode($fileData[0]);

        // $imgArr = json_decode($fileData[0], true);
        // $TotalImg = count($imgArr);

        // for ($k = 0; $k < $maxVariation; $k++) {

        //     $isAvaialbeVariationData = $attribute_ids[$k] || $attribute_values[$k] || $attribute_quantities[$k] ||  $imgArr[$k];

        //     if ($isAvaialbeVariationData) {

        //         if ($imgArr != null && count($imgArr) > 0) {


        //             for ($i = 0; $i < $TotalImg; $i++) {
        //                 // dd(count($imgArr[$i]));

        //                 $variant = new Variant();
        //                 $variant->attribute_id = $attribute_ids[$k];
        //                 $variant->attribute_value = $attribute_values[$k];
        //                 $variant->quantity = $attribute_quantities[$k];
        //                 $variant->product_id = $product->id;
        //                 $variant->save();


        //                 for ($t = 0; $t < count($imgArr[$i]); $t++) {

        //                     // dd($imgArr[$i][$t]);

        //                     $originalName = $imgArr[$i][$t];
        //                     // $extension = $imgArr[$i][$t]->getClientOriginalExtension();
        //                     $extension =  pathinfo($originalName, PATHINFO_EXTENSION);
        //                     $uniqueName = uniqid() . '.' . $extension;
        //                     // $fileSizeInBytes = $imgArr[$i][$t]->getSize();
        //                     $fileSizeInBytes = 122;

        //                     $file_size = $this->humanReadableFileSize($fileSizeInBytes);
        //                     $relativePath = '/uploads/' . $uniqueName;

        //                     $imgArr[$i][$t]->move(public_path('uploads'), $uniqueName);

        //                     dd($fileSizeInBytes);
        //                     $isImage = true;

        //                     if ($isImage) {
        //                         $image_model =  new ImageFiles();
        //                         $image_model->original_name = $originalName;
        //                         $image_model->absolute_path = $relativePath;
        //                         $image_model->extension = $extension;
        //                         $image_model->file_size = $file_size;

        //                         // $image_model->is_images = 0;
        //                         $image_model->is_images = 0;

        //                         $image_model->product_id = $product->id;
        //                         $image_model->variation_id = $variant->id;
        //                         $image_model->save();
        //                         $isImage = false;
        //                     } else {

        //                         $image_model =  new ImageFiles();
        //                         $image_model->original_name = $originalName;
        //                         $image_model->absolute_path = $relativePath;
        //                         $image_model->extension = $extension;
        //                         $image_model->file_size = $file_size;

        //                         $image_model->is_images = 1;
        //                         $image_model->product_id = $product->id;
        //                         $image_model->variation_id = $variant->id;

        //                         $image_model->save();
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end variation storing


        // start  variation storing
        //  $fileData = $request->variant_group; 

        //  $Files = $request->imageFiles;
        //  dd($Files);

        // dd(json_decode($fileData));
        // dd($fileData[0]);
        // return json_decode($fileData[0]);

        //   $imgArr = json_decode($fileData[0], true);
        //   $TotalImg = count($imgArr);

        //   for ($k = 0; $k < $maxVariation; $k++) {

        //       $isAvaialbeVariationData = $attribute_ids[$k] || $attribute_values[$k] || $attribute_quantities[$k] ||  $imgArr[$k];

        //       if ($isAvaialbeVariationData) {

        //           if ($imgArr != null && count($imgArr) > 0) {


        //               for ($i = 0; $i < $TotalImg; $i++) {
        //                   // dd(count($imgArr[$i]));

        //                   $variant = new Variant();
        //                   $variant->attribute_id = $attribute_ids[$k];
        //                   $variant->attribute_value = $attribute_values[$k];
        //                   $variant->quantity = $attribute_quantities[$k];
        //                   $variant->product_id = $product->id;
        //                   $variant->save();


        //                   for ($t = 0; $t < count($imgArr[$i]); $t++) {

        //                       // dd($imgArr[$i][$t]);

        //                       $originalName = $imgArr[$i][$t];
        //                       // $extension = $imgArr[$i][$t]->getClientOriginalExtension();
        //                       $extension =  pathinfo($originalName, PATHINFO_EXTENSION);
        //                       $uniqueName = uniqid() . '.' . $extension;
        //                       // $fileSizeInBytes = $imgArr[$i][$t]->getSize();
        //                       $fileSizeInBytes = 122;

        //                       $file_size = $this->humanReadableFileSize($fileSizeInBytes);
        //                       $relativePath = '/uploads/' . $uniqueName;

        //                       $imgArr[$i][$t]->move(public_path('uploads'), $uniqueName);

        //                       dd($fileSizeInBytes);
        //                       $isImage = true;

        //                       if ($isImage) {
        //                           $image_model =  new ImageFiles();
        //                           $image_model->original_name = $originalName;
        //                           $image_model->absolute_path = $relativePath;
        //                           $image_model->extension = $extension;
        //                           $image_model->file_size = $file_size;

        //                           // $image_model->is_images = 0;
        //                           $image_model->is_images = 0;

        //                           $image_model->product_id = $product->id;
        //                           $image_model->variation_id = $variant->id;
        //                           $image_model->save();
        //                           $isImage = false;
        //                       } else {

        //                           $image_model =  new ImageFiles();
        //                           $image_model->original_name = $originalName;
        //                           $image_model->absolute_path = $relativePath;
        //                           $image_model->extension = $extension;
        //                           $image_model->file_size = $file_size;

        //                           $image_model->is_images = 1;
        //                           $image_model->product_id = $product->id;
        //                           $image_model->variation_id = $variant->id;

        //                           $image_model->save();
        //                       }
        //                   }
        //               }
        //           }
        //       }
        //   }
        // end variation storing
    }

    public function postProduct(Request $request)
    {

        $all = $request->all();
        // dd($all);
        try {

            DB::beginTransaction();
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

            // Price data stored for simple product
            if (!is_null($request->p_purchase_price) || !is_null($request->p_regular_price)  || !is_null($request->p_sale_price)) {

                $price =  new Price();
                $price->purchase_price = $request->p_purchase_price;
                $price->regular_price = $request->p_regular_price;
                $price->sale_price = $request->p_sale_price;

                $price->unit_id = $request->unit_id;
                $price->product_id = $product->id;
                $price->save();
            }

            // review value stored
            $reviewNames = $request->review_name ?? [];
            $ratings = $request->review_rating ?? [];
            $hearts = $request->review_heart ?? [];
            $statuses = $request->review_status ?? [];
            $comments = $request->comments ?? [];
            $thumps_ups = $request->thump_ups ?? [];

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

            $maxLength = max(
                count($reviewNames),
                count($ratings),
                count($hearts),
                count($statuses),
                count($comments),
                count($thumps_ups),
                count($reviews_img_arr),
            );

            for ($j = 0; $j < $maxLength; $j++) {
                $isReviewProvided = $reviewNames[$j] || $ratings[$j] || $hearts[$j] ||
                    $statuses[$j] || $comments[$j] || $thumps_ups[$j] ||
                    isset($reviews_img_arr[$j]);

                if (!$isReviewProvided) {
                    continue; // Skip saving if no review data is provided
                } else {
                    $review = new Review();
                    $review->name = strtolower($reviewNames[$j]) ?? null;
                    $review->rating = $ratings[$j] ?? null;
                    $review->heart = $hearts[$j] ?? null;
                    $review->status = $statuses[$j] ?? null;
                    $review->comments = $comments[$j] ?? null;
                    $review->thumps_up = $thumps_ups[$j] ?? null;

                    if (isset($reviews_img_arr[$j])) {
                        $review->review_image_id = $reviews_img_arr[$j];
                    } else {
                        $review->review_image_id = null;
                    }

                    $review->product_id = $product->id;
                    $review->save();
                }
            }
            // end reviews


            // start variations stored model
            $attribute_ids = $request->attribute_ids ?? [];
            $attribute_values = $request->attribute_values ?? [];
            $attribute_quantities = $request->attribute_quantities ?? [];

            $maxVariation = max(
                count($attribute_ids),
                count($attribute_values),
                count($attribute_quantities),
            );


            //storing variation images
            // dd('start');

            $variantImg = $request->variant_images;

            for ($k = 0; $k < $maxVariation; $k++) {

                $isAvaialbeVariationData = $attribute_ids[$k] || $attribute_values[$k] || $attribute_quantities[$k] ||  $variantImg[$k];

                if ($isAvaialbeVariationData) {

                    $variant = new Variant();
                    $variant->attribute_id = $attribute_ids[$k];
                    $variant->attribute_value = $attribute_values[$k];
                    $variant->quantity = $attribute_quantities[$k];
                    $variant->product_id = $product->id;
                    $variant->save();


                    if ($variantImg != null && count($variantImg) > 0) {

                        $originalName = $variantImg[$k]->getClientOriginalName();
                        $extension = $variantImg[$k]->getClientOriginalExtension();
                        $uniqueName = uniqid() . '.' . $extension;
                        $fileSizeInBytes = $variantImg[$k]->getSize();


                        $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                        $relativePath = '/uploads/' . $uniqueName;

                        $variantImg[$k]->move(public_path('uploads'), $uniqueName);

                        $image_model =  new ImageFiles();
                        $image_model->original_name = $originalName;
                        $image_model->absolute_path = $relativePath;
                        $image_model->extension = $extension;
                        $image_model->file_size = $file_size;

                        $image_model->is_variation = 1;
                        $image_model->is_images = 0;

                        $image_model->product_id = $product->id;
                        $image_model->variant_id = $variant->id;
                        $image_model->save();
                    }
                }
            }

            // dd('end');
            // end variations stored model


            // price data stored for variation products
            $attribute_purchase_prices = $request->attribute_Purchase_prices ?? [];
            $attribute_regular_prices = $request->attribute_regular_prices ?? [];
            $attribute_sale_prices = $request->attribute_sale_prices ?? [];

            // dd($attribute_purchase_prices);
            $maxPrice = max(
                count($attribute_purchase_prices),
                count($attribute_regular_prices),
                count($attribute_sale_prices),
            );

            // !is_null($attribute_purchase_prices) ||  !is_null($attribute_regular_prices) || !is_null($attribute_sale_prices)

            for ($l = 0; $l < $maxPrice; $l++) {

                $isVAritionPrice = $attribute_purchase_prices[$l] || $attribute_regular_prices[$l] || $attribute_sale_prices[$l];

                if (!$isVAritionPrice) {
                    continue;
                } else {
                    $price1 = new Price();

                    $price1->purchase_price = $attribute_purchase_prices[$l] ?? null;
                    $price1->regular_price = $attribute_regular_prices[$l] ?? null;
                    $price1->sale_price = $attribute_sale_prices[$l] ?? null;

                    $price1->unit_id = $request->unit_id;
                    $price1->product_id = $product->id;
                    $price1->variation_id = $variantsArr[$l];
                    $price1->save();
                }
            }

            DB::commit();

            // return redirect()->route('products')->with(['success'=>'Successfully saved Product']);
            return redirect()->back();
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


public function removeProduct($id){
   

    $record =  Product::where('id', $id)->first();

    if ($record) {
        $record->delete();
        return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);

    }
    else{
        return redirect()->back()->with(['success' => 'Not Found the Record!']);

    }
}

    public function  variantList()
    {

        $variants = Variant::get();
        // dd($variants);

        return view('backend.variants.variants', compact('variants'));
    }

    public function  variantImage($variant_id)
    {
        return $variant_id;
    }

    public function  postImage(Request $request, $variant_id, $product_id)
    {

        $variantImg = $request->imgs;
        // dd($variantImg);
        if ($variantImg != null && count($variantImg) > 0) {

            for ($k = 0; $k < count($variantImg); $k++) {

                $originalName = $variantImg[$k]->getClientOriginalName();
                $extension = $variantImg[$k]->getClientOriginalExtension();
                $uniqueName = uniqid() . '.' . $extension;
                $fileSizeInBytes = $variantImg[$k]->getSize();


                $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                $relativePath = '/uploads/' . $uniqueName;

                $variantImg[$k]->move(public_path('uploads'), $uniqueName);

                $image_model =  new ImageFiles();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;

                $image_model->is_variation = 1;
                $image_model->is_images = 1;

                $image_model->product_id = $product_id;
                $image_model->variant_id = $variant_id;
                $image_model->save();
            }

            return response()->json(
                [
                    'success' => 'Success',
                ]

            );
        } else {
            return response()->json([
                'success' => 'Failed',
            ]);
        }
    }



    
public function removeVariant($id){
   
    $record =  Variant::where('id', $id)->first();

    if ($record) {
        $record->delete();
        return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);

    }
    else{
        return redirect()->back()->with(['success' => 'Not Found the Record!']);

    }
}
}

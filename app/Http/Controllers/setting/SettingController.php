<?php

namespace App\Http\Controllers\setting;

use Exception;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ImageFiles;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\ImageFile;

class SettingController extends Controller
{
    public function brands()
    {

        $brands = Brand::get();

        // dd($brands);
        return view('backend.brand.brands', compact('brands'));
    }


    public function addBrand()
    {
        return view('backend.brand.add-brand');
    }
    public function postBrand(Request $request)
    {
        $all = $request->all();
        // dd($all);
        $brand_img = $request->file('brand_img');

        $brand_id = null;

        try {
            // Start transaction
            DB::beginTransaction();

            if ($brand_img != null) {
                $originalName = $brand_img->getClientOriginalName();
                $extension = $brand_img->getClientOriginalExtension();
                $uniqueName = uniqid() . '.' . $extension;
                $fileSizeInBytes = $brand_img->getSize();
                $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                $relativePath = '/uploads/' . $uniqueName;
                // Move the uploaded file to the uploads directory
                $brand_img->move(public_path('uploads'), $uniqueName);


                $date = Carbon::now()->format('Y-m-d H:i:s');

                $image_model =  new ImageFiles();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $brand_id = $image_model->id;

                $brand = new Brand();
                $brand->name = $request->brand;
                $brand->description = $request->description;
                $brand->brand_image_id = $brand_id;
                $brand->save();

                // Commit transaction
                DB::commit();

                return redirect()->route('brands')->with('success', 'Successfully Saved Brand!');
            }
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

    public function colors()
    {
        $colors = Color::get();
        // dd($brands);
        return view('backend.color.colors', compact('colors'));
    }

    public function addColor()
    {
        return view('backend.color.add-color');
    }

    public function postColor(Request $request)
    {
        $all = $request->all();
        // dd($all);
        try {
            // Start transaction
            DB::beginTransaction();

            $color = new Color();
            $color->name = $request->color;
            $color->description = $request->description;
            $color->color_code = $request->color_code;
            $color->save();

            // Commit transaction
            DB::commit();

            return redirect()->route('colors')->with('success', 'Successfully Saved Color!');
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    public function customers()
    {
        $customers = User::where('role_id', null)->get();
        return view('backend.customer.customers', compact('customers'));
    }

    public function units()
    {
        $units = Unit::get();
        // dd($brands);
        return view('backend.unit.units', compact('units'));
    }

    public function addUnit()
    {
        return view('backend.unit.add-unit');
    }

    public function postUnit(Request $request)
    {
        $all = $request->all();
        // dd($all);
        try {
            // Start transaction
            DB::beginTransaction();

            $unit = new Unit();
            $unit->unit_type = $request->unit_type;
            $unit->base_unit_name = strtolower($request->base_unit_name); 
            $unit->symbol = $request->symbol;
            $unit->unit_conversion = $request->unit_conversion;
            $unit->save();

            // Commit transaction
            DB::commit();

            return redirect()->route('units')->with('success', 'Successfully Saved Unit!');
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


    public function attributes()
    {
        $attributes = Attribute::get();
        // dd($brands);
        return view('backend.attribute.attributes', compact('attributes'));
    }

    public function addAttribute()
    {
        return view('backend.attribute.add-attribute');
    }
    public function postAttribute(Request $request)
    {
        $all = $request->all();
        // dd($all);
        try {
            // Start transaction
            DB::beginTransaction();

            $attribute = new Attribute();
            $attribute->attribute_name = $request->attribute;
            $attribute->slug = $request->slug;
            $attribute->save();

            // Commit transaction
            DB::commit();

            return redirect()->route('attributes')->with('success', 'Successfully Saved Attribute!');
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    public function setAttributeValue($id)
    {
        $attr = Attribute::findOrFail($id);

        return view('backend.attribute.set-attribute', compact('id', 'attr'));
    }

    public function postSetAttributeValue(Request $request, $id)
    {

        $attr_value = $request->attribute;

        $arr = explode(' ', trim($attr_value));


        foreach ($arr as $value) {

            $attribute_val = new AttributeValue();
            $attribute_val->value = $value;
            $attribute_val->attribute_id = $id;
            $attribute_val->save();
        }

        return redirect()->route('attributes');
    }


    public function getAttributeValues($id)
    {
        $attributeval = AttributeValue::where('id', $id)->get();
        // dd($attributeval);

        $val = Attribute::find($id)->values;
        $values =  $val->toArray();

        if ($val) {

            return response()->json($values);
        }

        return response()->json([], 404); // Not found

    }


    public function postVendor(Request $request)
    {
        $vendor = new Vendor();
        $vendor->name = $request->vendor;
        $vendor->description = $request->description;
        $vendor->save();

        return redirect()->back();
    }

    public function categories()
    {

        $categories = Category::get();
        return view('backend.category.categories', compact('categories'));
    }


    public function addCategory($parentId = 0)
    {
        $tree_cate = Category::select('id', 'name')->get();
        return view('backend.category.add-category', compact('tree_cate'));
    }

    public function postCategory(Request $request)
    {

        $all = $request->all();
        try {

            // dd($all );
            $image_id = null;
            $category_image = $request->file('category_image');

            // Start transaction
            DB::beginTransaction();

            if ($category_image != null) {

                $originalName = $category_image->getClientOriginalName();
                $extension = $category_image->getClientOriginalExtension();
                $uniqueName = uniqid() . '.' . $extension;
                $fileSizeInBytes = $category_image->getSize();
                $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                $relativePath = '/uploads/' . $uniqueName;
                // Move the uploaded file to the uploads directory
                $category_image->move(public_path('uploads'), $uniqueName);

                $date = Carbon::now()->format('Y-m-d H:i:s');

                $image_model =  new ImageFiles();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $image_id = $image_model->id;
            }

            $category = new Category();
            $category->name = $request->category;
            $category->parent_category_id = $request->parent_category;
            $category->category_level = rand(0, 100);
            $category->category_image_id = $image_id;
            $category->save();

            // dd( $category );
            // Commit transaction
            DB::commit();

            //  return redirect()->route('categories')->with('success', 'Successfully Saved Category!');
            return redirect()->back();
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }

        $category = new Category();
    }
}

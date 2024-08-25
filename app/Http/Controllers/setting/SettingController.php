<?php

namespace App\Http\Controllers\setting;

use Exception;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Images;
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

                $image_model =  new Images();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $brand_id = $image_model->id;

                $brand = new Brand();
                $brand->name = strtolower($request->brand);
                $brand->description = $request->description;
                $brand->image_id = $brand_id;
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

    public function editBrand($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('backend.brand.edit-brand', compact('brand'));
    }



    public function postEditBrand(Request $request, $id)
    {
        $brand = Brand::where('id', $id)->first();

        $brand_img = $request->file('brand_img');
        if ($brand) {

            $setId = 0;

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

                $image_model =  new Images();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $setId = $image_model->id;
            }

            $brand->name = $request->brand ? strtolower($request->brand) : $brand->name;
            $brand->description = $request->description ? $request->description : $brand->description;
            $brand->image_id =  $brand_img ?  $setId : $brand->image_id;
            $brand->save();

            return redirect()->route('brands')->with(['success' => 'Seccessfully Edit the Record!']);
        } else {
            return redirect()->route('brands')->with(['success' => 'Not Found the Record!']);
        }
    }


    public function removeBrand($id)
    {
        $brand = Brand::where('id', $id)->first();
        if ($brand) {
            $brand->delete();

            return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
        } else {
            return redirect()->back()->with(['success' => 'Not Found the Record!']);
        }
    }





    public function postBrand1(Request $request)
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

                $image_model =  new Images();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $brand_id = $image_model->id;

                $brand = new Brand();
                $brand->name = strtolower($request->brand);
                $brand->description = $request->description;
                $brand->image_id = $brand_id;
                $brand->save();

                // Commit transaction
                DB::commit();

                return response()->json($brand);
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
            $color->name = strtolower($request->color);
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

    public function editColor($id)
    {
        $color = Color::where('id', $id)->first();
        return view('backend.color.edit-color', compact('color'));
    }
    public function postEditColor(Request $request, $id)
    {
        $color = Color::where('id', $id)->first();
        if ($color) {

            $color->name = $request->name ? $request->name : $color->name;
            $color->color_code = $request->color_code ? $request->color_code : $color->color_code;
            $color->description = $request->description ? $request->description : $color->description;
            $color->save();

            return redirect()->route('colors')->with(['success' => 'Seccessfully Edit the Record!']);
        } else {
            return redirect()->route('colors')->with(['success' => 'Not Found the Record!']);
        }
    }

    public function removeColor($id)
    {
        $color = Color::where('id', $id)->first();
        if ($color) {
            $color->delete();

            return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
        } else {
            return redirect()->back()->with(['success' => 'Not Found the Record!']);
        }
    }


    public function customers()
    {
        $customers = User::where('role_id', null)->get();
        // $customers=null;
        // dd( $customers);
        return view('backend.customer.customers', compact('customers'));
    }

    public function removeCustomer($id)
    {
        $customer = User::where('id', $id)->first();
        if ($customer) {
            $customer->delete();

            return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
        } else {
            return redirect()->back()->with(['success' => 'Not Found the Record!']);
        }
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
            $unit->unit_type = strtolower($request->unit_type);
            $unit->base_unit_name = strtolower($request->base_unit_name);
            $unit->symbol = strtoupper($request->symbol);
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

    public function editUnit($id)
    {
        $unit = Unit::where('id', $id)->first();
        return view('backend.unit.edit-unit', compact('unit'));
    }

    public function postEditUnit(Request $request, $id)
    {
        $unit = Unit::where('id', $id)->first();
        if ($unit) {

            $unit->unit_type = $request->unit_type ? $request->unit_type : $unit->unit_type;
            $unit->base_unit_name = $request->base_unit_name ? $request->base_unit_name : $unit->base_unit_name;
            $unit->symbol = $request->symbol ? $request->symbol : $unit->symbol;
            $unit->unit_conversion = $request->unit_conversion ? $request->unit_conversion : $unit->unit_conversion;
            $unit->save();

            return redirect()->route('colors')->with(['success' => 'Seccessfully Edit the Record!']);
        } else {
            return redirect()->route('colors')->with(['success' => 'Not Found the Record!']);
        }
    }

    public function removeUnit($id)
    {
        $unit = Unit::where('id', $id)->first();
        if ($unit) {
            $unit->delete();

            return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
        } else {
            return redirect()->back()->with(['success' => 'Not Found the Record!']);
        }
    }

    public function postUnit1(Request $request)
    {
        $all = $request->all();
        // dd($all);
        try {
            // Start transaction
            DB::beginTransaction();

            $unit = new Unit();
            $unit->unit_type = strtolower($request->unit_type);
            $unit->base_unit_name = strtolower($request->base_unit_name);
            $unit->symbol = strtoupper($request->symbol);
            $unit->unit_conversion = $request->unit_conversion;
            $unit->save();

            // Commit transaction
            DB::commit();

            return response()->json($unit);
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

    public function editAttribute($id)
    {
        $attribute = Attribute::where('id', $id)->first();
        return view('backend.attribute.edit-attribute', compact('attribute'));
    }

    public function postEditAttribute(Request $request, $id)
    {
        // dd( $request->all());
        $attribute = Attribute::where('id', $id)->first();
        if ($attribute) {
            $attribute->attribute_name = $request->attribute ? $request->attribute : $attribute->attribute_name;
            $attribute->slug = $request->slug ? $request->slug : $attribute->slug;
            $attribute->save();

            return redirect()->route('attributes')->with(['success' => 'Seccessfully Edit the Record!']);
        } else {
            return redirect()->route('attributes')->with(['success' => 'Not Found the Record!']);
        }
    }

    public function removeAttribute($id)
    {
        $attribute = Attribute::where('id', $id)->first();
        if ($attribute) {
            $attribute->delete();

            return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
        } else {
            return redirect()->back()->with(['success' => 'Not Found the Record!']);
        }
    }


    public function postAttribute1(Request $request)
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

            return response()->json($attribute);
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
        $vendor->name = strtolower($request->vendor);
        $vendor->description = $request->description;
        $vendor->save();

        return redirect()->back();
    }

    public function postVendor1(Request $request)
    {
        $vendor = new Vendor();
        $vendor->name = strtolower($request->vendor);
        $vendor->description = $request->description;
        $vendor->save();

        return response()->json($vendor);
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

                $image_model =  new Images();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $image_id = $image_model->id;
            }

            $category = new Category();
            $category->name = strtolower($request->category);
            $category->parent_category_id = $request->parent_category;
            $category->category_level = rand(0, 100);
            $category->category_image_id = $image_id;
            $category->save();

            // dd( $category );
            // Commit transaction
            DB::commit();

            //  return redirect()->route('categories')->with('success', 'Successfully Saved Category!');
            return redirect()->route('categories')->with(['success' => 'Seccessfully Saved the  Record!']);

        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();

        $tree_cate = Category::get();
        // dd( $tree_cate);
        return view('backend.category.edit-category', compact('tree_cate', 'category'));
    }


    public function postEditCategory(Request $request, $id)
    {
        
        $category = Category::where('id', $id)->first();

        $category_image =  $request->file('category_image');

        if ($category) {

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

                $image_model =  new Images();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

            }

            $category->name = $request->category? strtolower($request->category):  $category->name;
            $category->parent_category_id = $request->parent_category ? $request->parent_category : $category->parent_category_id;
            $category->category_level = rand(0, 100);
            $category->category_image_id =   $category_image ? $image_model->id :  $category->category_image_id;
            $category->save();

            return redirect()->route('categories')->with(['success' => 'Seccessfully Edit the Record!']);
        } else {
            return redirect()->route('categories')->with(['success' => 'Not Found the Record!']);
        
        }
    }
    public function removeCategory($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category) {
            $category->delete();

            return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
        } else {
            return redirect()->back()->with(['success' => 'Not Found the Record!']);
        }
    }

    public function postCategory1(Request $request)
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

                $image_model =  new Images();
                $image_model->original_name = $originalName;
                $image_model->absolute_path = $relativePath;
                $image_model->date = $date;
                $image_model->extension = $extension;
                $image_model->file_size = $file_size;
                $image_model->save();

                $image_id = $image_model->id;
            }

            $category = new Category();
            $category->name = strtolower($request->category);
            $category->parent_category_id = $request->parent_category;
            $category->category_level = rand(0, 100);
            $category->category_image_id = $image_id;
            $category->save();

            // dd( $category );
            // Commit transaction
            DB::commit();

            //  return redirect()->route('categories')->with('success', 'Successfully Saved Category!');
            return response()->json($category);
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


    public function logos()
    {
      
        return view('backend.logo.logo');
        
    }
    public function PostLogos()
    {
       dd('dsfdsf');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user permission list
        $permission_name = Permission::where('name', '=', 'dashboard.view')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "dashboard.view";
            $permission->alias = "General View";
            $permission->permission_group = "Dashboard";
            $permission->description = "Dashboard view for all user activities";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'user.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "user.index";
            $permission->alias = "View User List";
            $permission->permission_group = "User";
            $permission->description = "To view the list of the users";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'user.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "user.add";
            $permission->alias = "Add User";
            $permission->permission_group = "User";
            $permission->description = "To store a new user";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'user.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "user.edit";
            $permission->alias = "Edit User";
            $permission->permission_group = "User";
            $permission->description = "To Edit one user";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'user.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "user.delete";
            $permission->alias = "Delete User";
            $permission->permission_group = "User";
            $permission->description = "To delete one user";
            $permission->save();
        }



        // product permission list
        $permission_name = Permission::where('name', '=', 'product.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "product.index";
            $permission->alias = "Index Product";
            $permission->permission_group = "Product";
            $permission->description = "To show all Products";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'product.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "product.add";
            $permission->alias = "Add Product";
            $permission->permission_group = "Product";
            $permission->description = "To store one Product";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'product.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "product.edit";
            $permission->alias = "Edit Product";
            $permission->permission_group = "Product";
            $permission->description = "To edit one Product";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'product.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "product.delete";
            $permission->alias = "Delete Product";
            $permission->permission_group = "Product";
            $permission->description = "To delete one Product";
            $permission->save();
        }

        // unit permission list
        $permission_name = Permission::where('name', '=', 'unit.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "unit.index";
            $permission->alias = "Index Unit";
            $permission->permission_group = "Unit";
            $permission->description = "To show all units";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'unit.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "unit.add";
            $permission->alias = "Add Unit";
            $permission->permission_group = "Unit";
            $permission->description = "To store one unit";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'unit.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "unit.edit";
            $permission->alias = "Edit Unit";
            $permission->permission_group = "Unit";
            $permission->description = "To edit one unit";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'unit.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "unit.delete";
            $permission->alias = "Delete Unit";
            $permission->permission_group = "Unit";
            $permission->description = "To delete one unit";
            $permission->save();
        }

        // price permission list
        $permission_name = Permission::where('name', '=', 'price.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "price.index";
            $permission->alias = "Index price";
            $permission->permission_group = "Price";
            $permission->description = "To show all price lists";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'price.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "price.add";
            $permission->alias = "Add price";
            $permission->permission_group = "Price";
            $permission->description = "To add one price";
            $permission->save();
        }



        $permission_name = Permission::where('name', '=', 'price.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "price.edit";
            $permission->alias = "Edit price";
            $permission->permission_group = "Price";
            $permission->description = "To edit one price";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'price.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "price.delete";
            $permission->alias = "Delete price";
            $permission->permission_group = "Price";
            $permission->description = "To delete one price";
            $permission->save();
        }


        // brand permission list
        $permission_name = Permission::where('name', '=', 'brand.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "brand.index";
            $permission->alias = "Brand Index";
            $permission->permission_group = "Brand";
            $permission->description = "To show all brands";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'brand.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "brand.add";
            $permission->alias = "Add Brand";
            $permission->permission_group = "Brand";
            $permission->description = "To add one brand";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'brand.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "brand.edit";
            $permission->alias = "Edit Brand";
            $permission->permission_group = "Brand";
            $permission->description = "To edit one brand";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'brand.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "brand.delete";
            $permission->alias = "Delete brand";
            $permission->permission_group = "Brand";
            $permission->description = "To delete one brand";
            $permission->save();
        }


        // category permission list

        // brand permission list
        $permission_name = Permission::where('name', '=', 'category.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "category.index";
            $permission->alias = "Category Index";
            $permission->permission_group = "Category";
            $permission->description = "To show all categories";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'category.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "category.add";
            $permission->alias = "Add Category";
            $permission->permission_group = "Category";
            $permission->description = "To add one category";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'category.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "category.edit";
            $permission->alias = "Edit Category";
            $permission->permission_group = "Category";
            $permission->description = "To edit one category";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'category.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "category.delete";
            $permission->alias = "Delete Category";
            $permission->permission_group = "Category";
            $permission->description = "To delete one category";
            $permission->save();
        }

        // image files permission list
        $permission_name = Permission::where('name', '=', 'image_files.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "image_files.index";
            $permission->alias = "Image Files Index";
            $permission->permission_group = "Image Files";
            $permission->description = "To show all images from the image files";
            $permission->save();
        }
        $permission_name = Permission::where('name', '=', 'image_files.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "image_files.add";
            $permission->alias = "Add Image Files";
            $permission->permission_group = "Image Files";
            $permission->description = "To store one image to the image files";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'image_files.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "image_files.edit";
            $permission->alias = "Edit Image Files";
            $permission->permission_group = "Image Files";
            $permission->description = "To edit one image from the image files";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'image_files.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "image_files.delete";
            $permission->alias = "Delete Image Files";
            $permission->permission_group = "Image Files";
            $permission->description = "To delete one image from the image files";
            $permission->save();
        }


        // attributes permission list
        $permission_name = Permission::where('name', '=', 'attribute.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute.index";
            $permission->alias = "Attribute Index";
            $permission->permission_group = "Attribute";
            $permission->description = "To show all attributes";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'attribute.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute.add";
            $permission->alias = "Add Attribute";
            $permission->permission_group = "Attribute";
            $permission->description = "To add one attribute";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'attribute.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute.edit";
            $permission->alias = "Edit Attribute";
            $permission->permission_group = "Attribute";
            $permission->description = "To edit one attribute";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'attribute.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute.delete";
            $permission->alias = "Delete Attribute";
            $permission->permission_group = "Attribute";
            $permission->description = "To delete one attribute";
            $permission->save();
        }

        // attribute value permission list
        $permission_name = Permission::where('name', '=', 'attribute_value.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute_value.index";
            $permission->alias = "Attribute Value Index";
            $permission->permission_group = "Attribute Value";
            $permission->description = "To show all of the  attribute values";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'attribute_value.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute_value.add";
            $permission->alias = "Attribute Value Add";
            $permission->permission_group = "Attribute Value";
            $permission->description = "To add  one  attribute values";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'attribute_value.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute_value.edit";
            $permission->alias = "Edit Attribute Value";
            $permission->permission_group = "Attribute Value";
            $permission->description = "To edit one attribute value";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'attribute_value.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "attribute_value.delete";
            $permission->alias = "Delete Attribute Value";
            $permission->permission_group = "Attribute Value";
            $permission->description = "To delete one attribute value";
            $permission->save();
        }

        // variants value permission list
        $permission_name = Permission::where('name', '=', 'variants.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "variants.index";
            $permission->alias = "Variants Index";
            $permission->permission_group = "Variants";
            $permission->description = "To show all variants";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'variants.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "variants.add";
            $permission->alias = "Add Variants";
            $permission->permission_group ="Variants";
            $permission->description = "To add one variants";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'variants.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "variants.edit";
            $permission->alias = "Edit Variants";
            $permission->permission_group ="Variants";
            $permission->description = "To edit one variants";
            $permission->save();
        }



        $permission_name = Permission::where('name', '=', 'variants.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "variants.delete";
            $permission->alias = "Delete Variants";
            $permission->permission_group = "Variants";
            $permission->description = "To delete one variants";
            $permission->save();
        }

        //   reviews permission list
        $permission_name = Permission::where('name', '=', 'review.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "review.index";
            $permission->alias = "Review Index";
            $permission->permission_group = "Review";
            $permission->description = "To show all reviews";
            $permission->save();
        }
        $permission_name = Permission::where('name', '=', 'review.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "review.add";
            $permission->alias = "Add Review";
            $permission->permission_group = "Review";
            $permission->description = "To add one review";
            $permission->save();
        }
        $permission_name = Permission::where('name', '=', 'review.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "review.edit";
            $permission->alias = "Edit Review";
            $permission->permission_group = "Review";
            $permission->description = "To edit one review from the reviews";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'review.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "review.delete";
            $permission->alias = "Delete Review";
            $permission->permission_group = "Review";
            $permission->description = "To delete one review from the reviews";
            $permission->save();
        }

        // customer permission list
        $permission_name = Permission::where('name', '=', 'customer.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "customer.index";
            $permission->alias = "Customer Index";
            $permission->permission_group = "Customer";
            $permission->description = "To show all customer";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'customer.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "customer.add";
            $permission->alias = "Add Customer";
            $permission->permission_group = "Customer";
            $permission->description = "To Add one customer";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'customer.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "customer.edit";
            $permission->alias = "Edit Customer";
            $permission->permission_group = "Customer";
            $permission->description = "To edit one customer";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'customer.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "customer.delete";
            $permission->alias = "Delete Customer";
            $permission->permission_group = "Customer";
            $permission->description = "To delete one Customer from the Customers";
            $permission->save();
        }

        // orders permission list

        $permission_name = Permission::where('name', '=', 'order.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "order.index";
            $permission->alias = "Order Index";
            $permission->permission_group = "Order";
            $permission->description = "To show all orders";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'order.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "order.add";
            $permission->alias = "Add Order";
            $permission->permission_group = "Order";
            $permission->description = "To add one order";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'order.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "order.edit";
            $permission->alias = "Edit Order";
            $permission->permission_group = "Order";
            $permission->description = "To edit one order";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'order.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "order.delete";
            $permission->alias = "Delete Order";
            $permission->permission_group = "Order";
            $permission->description = "To delete one order";
            $permission->save();
        }

        // ordered items permission list

        $permission_name = Permission::where('name', '=', 'ordered_items.index')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "ordered_items.index";
            $permission->alias = "Ordered Items Index";
            $permission->permission_group = "Ordered Items";
            $permission->description = "To show all ordered_items";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'ordered_items.add')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "ordered_items.add";
            $permission->alias = "Add Ordered Item ";
            $permission->permission_group = "Ordered Items";
            $permission->description = "To add ordered_item";
            $permission->save();
        }

        $permission_name = Permission::where('name', '=', 'ordered_items.edit')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "ordered_items.edit";
            $permission->alias = "Edit Ordered Item ";
            $permission->permission_group = "Ordered Items";
            $permission->description = "To edit one ordered_item";
            $permission->save();
        }


        $permission_name = Permission::where('name', '=', 'ordered_items.delete')->first();

        if ($permission_name == null) {

            $permission = new Permission();
            $permission->name = "ordered_items.delete";
            $permission->alias = "Delete Ordered Item ";
            $permission->permission_group = "Ordered Items";
            $permission->description = "To delete one ordered_item";
            $permission->save();
        }
    }
}

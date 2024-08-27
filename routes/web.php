<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\setting\SettingController;

// Route::group(['namespace' => 'App\Http\Controllers\UserController'], function() {}); 
//if use this line then dont need to import class direct can write the controller name with function like this "Route::post('login', 'LoginController@login');"

Route::get('/', function () {
    // return view('welcome');
    return view('backend.auth.sign-in');
})->name('login');


Route::get('/missing_page', function () {
    // return view('welcome');
    return view('backend.missing_page');
})->name('miss.page');


Route::get('sign-up', [AuthController::class, 'register'])->name('admin.register');
Route::post('/admin/post-register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('sign-in', [AuthController::class, 'login'])->name('admin.login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('post.login');


// logout route
Route::get('logout', function () {
    Auth::logout();
    return redirect(url(''));
})->name('logout');



// start middleware group
Route::middleware(['auth_user'])->group(function () {

    // Admin Authentication routes
    Route::group(['prefix' => 'admin'], function () {

        Route::get('master_page', function () {
            return view('backend.layouts.master_page');
        });

        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('forget-password', [AuthController::class, 'forget'])->name('admin.forget');
        Route::post('/admin/post-forget', [AuthController::class, 'postForget'])->name('post.forget');

        Route::get('update-password/{userId}', [AuthController::class, 'updatePassword'])->name('update.password');

        Route::post('post-update-password/{userId}', [AuthController::class, 'postUpdatePassword'])->name('post.update-password');

        // Terms and condition routes
        Route::get('terms-condition', [AuthController::class, 'terms'])->name('admin.terms');
        Route::get('privacy-policy', [AuthController::class, 'privacy'])->name('admin.privacy');
    });

    // user routes
    Route::group(['prefix' => 'user'], function () {

        Route::get('users', [UserController::class, 'user'])->name('users');
        Route::get('add-user', [UserController::class, 'addUser'])->name('add.user');
        Route::post('post-add-user', [UserController::class, 'postAddUser'])->name('post.add.user');

        Route::get('assign-user-role/{user_id}', [UserController::class, 'assignUserRole'])->name('assign.user.role');

        Route::post('/post-role-assign/{user_id}', [UserController::class, 'postRoleAssign'])->name('post.assign.role');

        Route::get('view-user/{user_id}', [UserController::class, 'viewUser'])->name('view.user');
        Route::get('edit-user/{user_id}', [UserController::class, 'editUser'])->name('edit.user');
        Route::post('post-edit-user/{user_id}', [UserController::class, 'postEditUser'])->name('post.edit.user');
        Route::get('remove-user/{user_id}', [UserController::class, 'removeUser'])->name('remove.user');
    });

    // role routes
    Route::group(['prefix' => 'role'], function () {

        Route::get('roles', [RoleController::class, 'role'])->name('roles');
        Route::get('add-role', [RoleController::class, 'addRole'])->name('add.role');
        Route::post('post-role', [RoleController::class, 'postRole'])->name('post.role');
        Route::get('permission-list/{id}', [RoleController::class, 'permissionList'])->name('permission.list');
        Route::get('edit-role/{id}', [RoleController::class, 'editRole'])->name('edit.role');
        Route::post('post-edit-role/{id}', [RoleController::class, 'postEditRole'])->name('post.edit.role');
        Route::get('remove-role/{id}', [RoleController::class, 'removeRole'])->name('remove.role');

        Route::get('role-permission-index', [RoleController::class, 'rolePermissionIndex'])->name('role.permission');
        Route::post('post-role-permission-index', [RoleController::class, 'postRolePermissionIndex'])->name('post.role.permission');
        Route::get('rolewise-permission-index', [RoleController::class, 'rolewisePermissionIndex'])->name('rolewise.permission');
    });

    // supplier routes
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('dashboard', [AuthController::class, 'supplierDashboard'])->name('supplier.dashboard');
    });

    // manager routes
    Route::group(['prefix' => 'manager'], function () {

        Route::get('dashboard', [AuthController::class, 'managerDashboard'])->name('manager.dashboard');
    });

    // brand routes
    Route::group(['prefix' => 'brand'], function () {

        Route::get('brands', [SettingController::class, 'brands'])->name('brands');
        Route::get('add-brand', [SettingController::class, 'addBrand'])->name('add.brand');
        Route::post('post-brand', [SettingController::class, 'postBrand'])->name('post.brand');
        Route::post('post-brand1', [SettingController::class, 'postBrand1'])->name('post.brand1');

        Route::get('edit-brand/{id}', [SettingController::class, 'editBrand'])->name('edit.brand');
        Route::post('post-edit-unit/{id}', [SettingController::class, 'postEditBrand'])->name('post.edit.brand');
        Route::get('remove-brand/{id}', [SettingController::class, 'removeBrand'])->name('remove.brand');
    });

    // unit routes
    Route::group(['prefix' => 'unit'], function () {

        Route::get('units', [SettingController::class, 'units'])->name('units');
        Route::get('add-unit', [SettingController::class, 'addUnit'])->name('add.unit');
        Route::post('post-unit', [SettingController::class, 'postUnit'])->name('post.unit');
        Route::post('post-unit1', [SettingController::class, 'postUnit1'])->name('post.unit1');

        Route::get('edit-unit/{id}', [SettingController::class, 'editUnit'])->name('edit.unit');
        Route::post('post-edit-unit/{id}', [SettingController::class, 'postEditUnit'])->name('post.edit.unit');
        Route::get('remove-unit/{id}', [SettingController::class, 'removeUnit'])->name('remove.unit');
    });

    // attribute routes
    Route::group(['prefix' => 'attribute'], function () {

        Route::get('attributes', [SettingController::class, 'attributes'])->name('attributes');
        Route::get('add-attribute', [SettingController::class, 'addAttribute'])->name('add.attribute');
        Route::post('post-attribute', [SettingController::class, 'postAttribute'])->name('post.attribute');
        Route::post('post-attribute1', [SettingController::class, 'postAttribute1'])->name('post.attribute1');
        Route::get('edit-attribute/{id}', [SettingController::class, 'editAttribute'])->name('edit.attribute');
        Route::post('post-edit-attribute/{id}', [SettingController::class, 'postEditAttribute'])->name('post.edit.attribute');

        Route::get('remove-attribute/{id}', [SettingController::class, 'removeAttribute'])->name('remove.attribute');


        Route::get('set-attribute-value/{value}', [SettingController::class, 'setAttributeValue'])->name('set.attribute.value');

        Route::post('post-set-attribute-value/{value}', [SettingController::class, 'postSetAttributeValue'])->name('post.set.attribute.value');

        Route::get('/attribute-values/{id}', [SettingController::class, 'getAttributeValues'])->name('attribute.value');
    });

    // category routes
    Route::group(['prefix' => 'category'], function () {

        Route::get('categories', [SettingController::class, 'categories'])->name('categories');
        Route::get('add-category', [SettingController::class, 'addCategory'])->name('add.category');
        Route::post('post-category', [SettingController::class, 'postCategory'])->name('post.category');
        Route::post('post-category1', [SettingController::class, 'postCategory1'])->name('post.category1');

        Route::get('edit-category/{id}', [SettingController::class, 'editCategory'])->name('edit.category');
        Route::post('post-edit-category/{id}', [SettingController::class, 'postEditCategory'])->name('post.edit.category');
        Route::get('remove-category/{id}', [SettingController::class, 'removeCategory'])->name('remove.category');
    });

    // color routes
    Route::group(['prefix' => 'color'], function () {
        Route::get('colors', [SettingController::class, 'colors'])->name('colors');
        Route::get('add-color', [SettingController::class, 'addColor'])->name('add.color');
        Route::post('post-color', [SettingController::class, 'postColor'])->name('post.color');

        Route::get('edit-color/{id}', [SettingController::class, 'editColor'])->name('edit.color');
        Route::post('post-edit-color/{id}', [SettingController::class, 'postEditColor'])->name('post.edit.color');

        Route::get('remove-color/{id}', [SettingController::class, 'removeColor'])->name('remove.color');
    });


    // customer routes
    Route::group(['prefix' => 'customer'], function () {
        Route::get('customers', [SettingController::class, 'customers'])->name('customers');
        Route::get('remove-customer/{id}', [SettingController::class, 'removeCustomer'])->name('remove.customer');
    });


    // product routes
    Route::group(['prefix' => 'product'], function () {

        Route::get('send-status/{status}/{id}', [ProductController::class, 'sendStatus'])->name('send.status');
        Route::get('send-featured/{featured}/{id}', [ProductController::class, 'sendFeatured'])->name('send.featured');

        Route::get('products', [ProductController::class, 'products'])->name('products');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('add.product');
        Route::post('post-add-product', [ProductController::class, 'postProduct'])->name('post.product');


        Route::get('edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
        Route::get('remove-product/{id}', [ProductController::class, 'removeProduct'])->name('remove.product');


        Route::get('variant-list', [ProductController::class, 'variantList'])->name('variant.list');

        Route::get('variant-image/{variant_id}/{product_id}', [ProductController::class, 'variantImage'])->name('add.image');
        Route::post('post-variant-image/{variant_id}/{product_id}', [ProductController::class, 'postImage'])->name('post.variant.Image');

        Route::get('remove-variant-image/{id}', [ProductController::class, 'removeVariant'])->name('remove.variant');

        Route::get('offers', [ProductController::class, 'offers'])->name('offers');
        Route::post('post-offers', [ProductController::class, 'postOffers'])->name('post.offers');
    });

    // product routes
    Route::group(['prefix' => 'vendor'], function () {
        Route::post('post-add-vendor', [SettingController::class, 'postVendor'])->name('post.vendor');
        Route::post('post-add-vendor1', [SettingController::class, 'postVendor1'])->name('post.vendor1');
    });

    // order routes
    Route::group(['prefix' => 'order'], function () {
        Route::get('orders', [SettingController::class, 'orders'])->name('orders');
        Route::get('add/order', [SettingController::class, 'addOrder'])->name('add.order');
    });

    // app routes
    Route::group(['prefix' => 'app'], function () {
        Route::get('app-info', [SettingController::class, 'appInfo'])->name('app.info');
        Route::post('post-app-info', [SettingController::class, 'postAppInfo'])->name('post.app.info');
        Route::get('app-view', [SettingController::class, 'appView'])->name('app.view');

        // Route::get('edit-app', [SettingController::class, 'EditApp'])->name('edit.app');
        Route::get('remove-app/{id}', [SettingController::class, 'removeApp'])->name('remove.app');
        
        Route::get('campaigns', [SettingController::class, 'campaigns'])->name('campaigns');

        Route::get('email-setting', [SettingController::class, 'emailSetting'])->name('email.setting');
        Route::get('language-setting', [SettingController::class, 'socialLogin'])->name('language.setting');
        Route::get('social-login', [SettingController::class, 'socialLogin'])->name('social.login');
        Route::get('message', [SettingController::class, 'message'])->name('message');
        Route::get('support', [SettingController::class, 'support'])->name('support');
    });


    // report routes
    Route::group(['prefix' => 'report'], function () {

        Route::get('product-report', [SettingController::class, 'productReport'])->name('report.product');
        Route::get('order-report', [SettingController::class, 'orderReport'])->name('report.order');
        Route::get('stock-report', [SettingController::class, 'stockReport'])->name('report.stock');
    });
});

// middleware end

Route::get('/home/index', function () {
    return view('frontend.home');
});

// Social Login GOOGLE 
Route::get('/auth/google', [GoogleAuthController::class, 'redirectGoogle'])->name('google.login');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


// Social Login FACEBOOK 
Route::get('/auth/facebook', [GoogleAuthController::class, 'redirectFacebook'])->name('facebook.login');
Route::get('/auth/facebook/call-back', [GoogleAuthController::class, 'callbackFacebook']);

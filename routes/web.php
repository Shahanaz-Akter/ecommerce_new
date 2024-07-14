<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Product\ProductController;

Route::get('/', function () {
    // return view('welcome');
    return view('backend.auth.sign-in');
});

// Admin Authentication section

Route::get('/admin/master_page', function () {
    return view('backend.layouts.master_page');
});

Route::get('/admin/dashboard',[AuthController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/sign-up', [AuthController::class, 'register'])->name('admin.register');
Route::post('/admin/post-register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('/admin/sign-in', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/post-login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/admin/forget-password', [AuthController::class, 'forget'])->name('admin.forget');
Route::post('/admin/post-forget', [AuthController::class, 'postForget'])->name('post.forget');

Route::get('/admin/update-password/{userId}', [AuthController::class, 'updatePassword'])->name('update.password');

Route::post('/admin/post-update-password/{userId}', [AuthController::class, 'postUpdatePassword'])->name('post.update-password');

Route::get('/admin/terms-condition', [AuthController::class, 'terms'])->name('admin.terms');
Route::get('/admin/privacy-policy', [AuthController::class, 'privacy'])->name('admin.privacy');

Route::get('/product/add-product', [ProductController::class, 'addProduct'])->name('add.product');


Route::get('/home/index', function () {
    return view('frontend.home');
});

// Social Login GOOGLE 
Route::get('/auth/google', [GoogleAuthController::class, 'redirectGoogle'])->name('google.login');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


// Social Login FACEBOOK 
Route::get('/auth/facebook', [GoogleAuthController::class, 'redirectFacebook'])->name('facebook.login');
Route::get('/auth/facebook/call-back', [GoogleAuthController::class, 'callbackFacebook']);
http://127.0.0.1:8000/admin/sign-up
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/admin/sign-in-google', [AuthController::class, 'google'])->name('google.login');
Route::get('/admin/sign-in-facebook', [AuthController::class, 'facebook'])->name('facebook.login');

Route::get('/home/index', function () {
    return view('frontend.index');
});
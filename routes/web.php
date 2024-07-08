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

Route::get('/admin/dashboard', function () {
    return view('backend.layouts.dashboard');
});


Route::get('/admin/sign-up', [AuthController::class, 'register'])->name('register');
Route::post('/admin/post-register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('/admin/sign-in', [AuthController::class, 'login'])->name('login');
Route::post('/admin/post-login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/admin/forget-password', [AuthController::class, 'forget'])->name('forget');

Route::get('/admin/terms-condition', [AuthController::class, 'terms'])->name('terms');
Route::get('/admin/privacy-policy', [AuthController::class, 'privacy'])->name('privacy');

Route::get('/admin/sign-in-google', [AuthController::class, 'google'])->name('google.login');
Route::get('/admin/sign-in-facebook', [AuthController::class, 'facebook'])->name('facebook.login');

Route::get('/home/index', function () {
    return view('frontend.index');
});
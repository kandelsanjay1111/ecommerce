<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-login',[App\Http\Controllers\AdminController::class,'index'])->name('admin.login');
Route::post('/admin-auth',[App\Http\Controllers\AdminController::class,'auth'])->name('admin.auth');
Route::post('/admin-logout',[App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');
Route::group(['middleware'=>'admin_auth','as'=>'admin.'],function(){

    Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');

    //admin category routes
    Route::get('/admin/category',[App\Http\Controllers\CategoryController::class,'index'])->name('category');
    Route::get('/admin/category/create',[App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('admin/category',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('admin/category/{category}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::put('admin/category/{category}',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
    Route::delete('admin/category/{category}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('/admin/category/status/{category}',[App\Http\Controllers\CategoryController::class,'status'])->name('category.status');

    //Coupon routes
     Route::get('/admin/coupon',[App\Http\Controllers\CouponController::class,'index'])->name('coupon');
     Route::get('/admin/coupon/create',[App\Http\Controllers\CouponController::class,'create'])->name('coupon.create');
    Route::post('admin/coupon',[App\Http\Controllers\CouponController::class,'store'])->name('coupon.store');
    Route::get('admin/coupon/{coupon}',[App\Http\Controllers\CouponController::class,'edit'])->name('coupon.edit');
    Route::put('admin/coupon/{coupon}',[App\Http\Controllers\CouponController::class,'update'])->name('coupon.update');
    Route::delete('admin/coupon/{coupon}',[App\Http\Controllers\CouponController::class,'destroy'])->name('coupon.destroy');
    Route::get('/admin/coupon/status/{coupon}',[App\Http\Controllers\CouponController::class,'status'])->name('coupon.status');

    //Size routes
    Route::get('/admin/size',[App\Http\Controllers\SizeController::class,'index'])->name('size');
    Route::get('/admin/size/create',[App\Http\Controllers\SizeController::class,'create'])->name('size.create');
    Route::post('admin/size',[App\Http\Controllers\SizeController::class,'store'])->name('size.store');
    Route::get('admin/size/{size}',[App\Http\Controllers\SizeController::class,'edit'])->name('size.edit');
    Route::put('admin/size/{size}',[App\Http\Controllers\SizeController::class,'update'])->name('size.update');
    Route::delete('admin/size/{size}',[App\Http\Controllers\SizeController::class,'destroy'])->name('size.destroy');
    Route::get('/admin/size/status/{size}',[App\Http\Controllers\SizeController::class,'status'])->name('size.status');

    //Color routes
    Route::get('/admin/color',[App\Http\Controllers\ColorController::class,'index'])->name('color');
    Route::get('/admin/color/create',[App\Http\Controllers\ColorController::class,'create'])->name('color.create');
    Route::post('admin/color',[App\Http\Controllers\ColorController::class,'store'])->name('color.store');
    Route::get('admin/color/{color}',[App\Http\Controllers\ColorController::class,'edit'])->name('color.edit');
    Route::put('admin/color/{color}',[App\Http\Controllers\ColorController::class,'update'])->name('color.update');
    Route::delete('admin/color/{color}',[App\Http\Controllers\ColorController::class,'destroy'])->name('color.destroy');
    Route::get('/admin/color/status/{color}',[App\Http\Controllers\ColorController::class,'status'])->name('color.status');

    //Product Routes
    Route::get('/admin/product',[App\Http\Controllers\ProductController::class,'index'])->name('product');
    Route::get('/admin/product/create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');
    Route::post('admin/product',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
    Route::get('admin/product/{product}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
    Route::put('admin/product/{product}',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
    Route::delete('admin/product/{product}',[App\Http\Controllers\ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/admin/product/status/{product}',[App\Http\Controllers\ProductController::class,'status'])->name('product.status');
});

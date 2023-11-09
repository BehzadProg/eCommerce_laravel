<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGallery;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;

Route::get('dashboard' , [VendorController::class , 'dashboard'])->name('dashboard');

 /** vendor profile routes */
 Route::get('profile' , [VendorProfileController::class , 'index'])->name('profile');
 Route::put('profile/update' , [VendorProfileController::class , 'profileUpdate'])->name('profile.update');
 Route::post('profile/password/update' , [VendorProfileController::class , 'passwordUpdate'])->name('password.update');

 /** vendor shop profile route */
Route::resource('shop-profile', VendorShopProfileController::class);

/** vendor product route */
Route::put('product/change-status',[VendorProductController::class , 'changeStatus'])->name('product.change-status');
Route::get('product/get-subcategory' , [VendorProductController::class , 'getSubCategory'])->name('get-subcategories');
Route::get('product/get-childcategory' , [VendorProductController::class , 'getChildCategory'])->name('get-childcategories');
Route::resource('products', VendorProductController::class);

/** vendor Product Gallery route */
Route::resource('product-image-gallery', VendorProductImageGallery::class);

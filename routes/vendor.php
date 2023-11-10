<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGallery;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
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

/** vendor product variant route */
Route::put('variant/change-status',[VendorProductVariantController::class , 'changeStatus'])->name('variant.change-status');
Route::resource('product-variants', VendorProductVariantController::class);

/** Prouduct Variant item route */
Route::get('product-variant-item/{productId}/{variantId}' , [VendorProductVariantItemController::class , 'index'])->name('variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}' , [VendorProductVariantItemController::class , 'create'])->name('variant-item.create');
Route::post('product-variant-item' , [VendorProductVariantItemController::class , 'store'])->name('variant-item.store');
Route::get('product-variant-item-edit/{productId}/{variantItemId}' , [VendorProductVariantItemController::class , 'edit'])->name('variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}' , [VendorProductVariantItemController::class , 'update'])->name('variant-item.update');
Route::delete('product-variant-item/{variantItemId}' , [VendorProductVariantItemController::class , 'destroy'])->name('variant-item.destroy');
Route::put('product-variant-item/change-status',[VendorProductVariantItemController::class , 'changeStatus'])->name('variant-item.change-status');

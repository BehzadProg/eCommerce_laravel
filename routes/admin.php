<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;

Route::get('dashboard' , [AdminController::class , 'dashboard'])->name('dashboard');

/** admin profile route */
Route::get('profile' , [ProfileController::class , 'index'])->name('profile');

Route::post('profile/update' , [ProfileController::class , 'updateProfile'])->name('profile.update');

Route::post('profile/password/update' , [ProfileController::class , 'updatePassword'])->name('password.update');
/** slider route */
Route::resource('slider', SliderController::class);
/** category route */
Route::put('change-status',[CategoryController::class , 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);
/** sub category route */
Route::put('subcategory/change-status',[SubCategoryController::class , 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);
/** child category route */
Route::put('childcategory/change-status',[ChildCategoryController::class , 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories' , [ChildCategoryController::class , 'getSubCategory'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);
/** brand route */
Route::put('brand/change-status',[BrandController::class , 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);
/** Vendor Admin Profile route */
Route::resource('vendor-profile', AdminVendorProfileController::class);
/** Product route */
Route::get('product/get-subcategory' , [ProductController::class , 'getSubCategory'])->name('get-subcategories');
Route::get('product/get-childcategory' , [ProductController::class , 'getChildCategory'])->name('get-childcategories');
Route::resource('product', ProductController::class);
/** Product Gallery route */
Route::resource('product-image-gallery', ProductImageGalleryController::class);
/** Prouduct Variant route */
Route::put('variant/change-status',[ProductVariantController::class , 'changeStatus'])->name('variant.change-status');
Route::resource('product-variants', ProductVariantController::class);
/** Prouduct Variant item route */
Route::get('product-variant-item/{productId}/{variantId}' , [ProductVariantItemController::class , 'index'])->name('variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}' , [ProductVariantItemController::class , 'create'])->name('variant-item.create');
Route::post('product-variant-item' , [ProductVariantItemController::class , 'store'])->name('variant-item.store');
Route::get('product-variant-item/{id}/edit' , [ProductVariantItemController::class , 'edit'])->name('variant-item.edit');
Route::get('product-variant-item/{id}' , [ProductVariantItemController::class , 'destroy'])->name('variant-item.destroy');

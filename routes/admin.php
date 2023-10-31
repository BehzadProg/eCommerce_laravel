<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
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
Route::put('SubCategory/change-status',[SubCategoryController::class , 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

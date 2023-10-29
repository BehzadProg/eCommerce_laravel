<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;

Route::get('dashboard' , [VendorController::class , 'dashboard'])->name('dashboard');

 /** vendor profile routes */
 Route::get('profile' , [VendorProfileController::class , 'index'])->name('profile');
 Route::put('profile/update' , [VendorProfileController::class , 'profileUpdate'])->name('profile.update');
 Route::post('profile/password/update' , [VendorProfileController::class , 'passwordUpdate'])->name('password.update');

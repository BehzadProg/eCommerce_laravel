<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\Homecontroller;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Homecontroller::class , 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/login' , [AdminController::class , 'login'])->name('admin.login');

Route::get('flash-sale' , [FlashSaleController::class , 'index'])->name('flash-sale.index');

/** Product Detailes Route */
Route::get('product-detail/{slug}' , [FrontendProductController::class , 'showProduct'])->name('product-detail');

Route::group(['middleware' => ['auth','verified'] , 'prefix' => 'user' , 'as' => 'user.'] , function(){

    Route::get('dashboard' , [UserDashboardController::class , 'index'])->name('dashboard');
    /** user profile routes */
    Route::get('profile' , [UserProfileController::class , 'index'])->name('profile');
    Route::put('profile/update' , [UserProfileController::class , 'profileUpdate'])->name('profile.update');
    Route::post('profile/password/update' , [UserProfileController::class , 'passwordUpdate'])->name('password.update');

    /** user address route */
    Route::resource('address' , UserAddressController::class);
});

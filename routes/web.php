<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\PaymentCotroller;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\Homecontroller;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
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

/** Cart routes */
Route::post('add-to-cart' , [CartController::class , 'addToCart'])->name('add-to-cart');
Route::get('cart-details' , [CartController::class , 'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity' , [CartController::class , 'updateProductQty'])->name('cart-update-quantity');
Route::get('clear-cart' , [CartController::class , 'clearCart'])->name('clear-cart');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count' , [CartController::class , 'getCartCount'])->name('cart-count');
Route::get('cart-products' , [CartController::class , 'fetchCartProduct'])->name('fetch-cart');
Route::post('remove-cart-product' , [CartController::class , 'removeCartProduct'])->name('remove-cart-product');
Route::get('cart/sidebar-product-total' , [CartController::class , 'cartTotal'])->name('cart.sidebar-product-total');
// coupon route
Route::get('apply-coupon' , [CartController::class , 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation' , [CartController::class , 'couponCalculation'])->name('coupon-calculation');

Route::group(['middleware' => ['auth','verified'] , 'prefix' => 'user' , 'as' => 'user.'] , function(){

    Route::get('dashboard' , [UserDashboardController::class , 'index'])->name('dashboard');
    /** user profile routes */
    Route::get('profile' , [UserProfileController::class , 'index'])->name('profile');
    Route::put('profile/update' , [UserProfileController::class , 'profileUpdate'])->name('profile.update');
    Route::post('profile/password/update' , [UserProfileController::class , 'passwordUpdate'])->name('password.update');

    /** user address route */
    Route::resource('address' , UserAddressController::class);

    /** user order route */
    Route::get('order' , [UserOrderController::class , 'index'])->name('order.index');
    Route::get('order/show/{id}' , [UserOrderController::class , 'show'])->name('order.show');

    /** check out route */
    Route::get('checkout' , [CheckOutController::class , 'index'])->name('checkout');
    Route::post('checkout/address-create' , [CheckOutController::class , 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/submit-form' , [CheckOutController::class , 'checkoutFormSubmit'])->name('checkout.form.submit');

    /** payment route */
    Route::get('payment' , [PaymentCotroller::class , 'index'])->name('payment');
    Route::get('payment-success' , [PaymentCotroller::class , 'paymentSuccess'])->name('payment.success');

    /** paypal routes */
    Route::get('paypal/payment' , [PaymentCotroller::class , 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success' , [PaymentCotroller::class , 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel' , [PaymentCotroller::class , 'paypalCancel'])->name('paypal.cancel');

    /** Stripe routes */
    Route::post('stripe/payment' , [PaymentCotroller::class , 'payWithStripe'])->name('stripe.payment');

    Route::get('payir/payment' , [PaymentCotroller::class , 'payWithPayIr'])->name('payir.payment');
    Route::get('payment-verify' , [PaymentCotroller::class , 'paymentVerify'])->name('payment.verify');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\couponController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialsController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PayIrSettingController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TransactionController;

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
Route::put('product/change-status',[ProductController::class , 'changeStatus'])->name('product.change-status');
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
Route::get('product-variant-item-edit/{productId}/{variantItemId}' , [ProductVariantItemController::class , 'edit'])->name('variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}' , [ProductVariantItemController::class , 'update'])->name('variant-item.update');
Route::delete('product-variant-item/{variantItemId}' , [ProductVariantItemController::class , 'destroy'])->name('variant-item.destroy');
Route::put('product-variant-item/change-status',[ProductVariantItemController::class , 'changeStatus'])->name('variant-item.change-status');

/** Seller Product Route */
Route::get('seller-product' , [SellerProductController::class , 'index'])->name('seller-product.index');
Route::get('seller-pending-product' , [SellerProductController::class , 'pendingProducts'])->name('seller-pending-product.index');
Route::put('change-approve-status' , [SellerProductController::class , 'changeApprove'])->name('change-approve-status');

/** Flash Sale Route */
Route::get('flash-sale' , [FlashSaleController::class , 'index'])->name('flash-sale.index');
Route::put('flash-sale-date' , [FlashSaleController::class , 'updateDate'])->name('flash-sale.update');
Route::post('flash-sale/add-product' , [FlashSaleController::class , 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/change' , [FlashSaleController::class , 'changeShowAtHome'])->name('flash-sale.show-at-home.change');
Route::put('flash-sale/change-status',[FlashSaleController::class , 'changeStatus'])->name('flash-sale.change-status');
Route::delete('flash-sale/{id}/destroy',[FlashSaleController::class , 'destroy'])->name('flash-sale.destroy');

/** coupon route */
Route::put('coupons/change-status',[couponController::class , 'changeStatus'])->name('coupon.change-status');
Route::resource('coupons' , couponController::class);

/** Shipping Rule route */
Route::put('shipping-rule/change-status',[ShippingRuleController::class , 'changeStatus'])->name('shippingRule.change-status');
Route::resource('shipping-rule' , ShippingRuleController::class);

/** Orders route */
Route::get('payment-status' , [OrderController::class , 'changePaymentStatus'])->name('payment.status');
Route::get('order-status' , [OrderController::class , 'changeOrderStatus'])->name('order.status');
Route::get('order-pending' , [OrderController::class , 'showPendingOrders'])->name('order-pending');
Route::get('order-processed' , [OrderController::class , 'showProcessedOrders'])->name('order-processed');
Route::get('order-dropped-off' , [OrderController::class , 'showDroppedOffOrders'])->name('order-dropped-off');
Route::get('order-shipped' , [OrderController::class , 'showShippedOrders'])->name('order-shipped');
Route::get('order-out-for-delivery' , [OrderController::class , 'showOutForDeliveryOrders'])->name('order-out-for-delivery');
Route::get('order-delivered' , [OrderController::class , 'showDeliveredOrders'])->name('order-delivered');
Route::get('order-canceled' , [OrderController::class , 'showCanceledOrders'])->name('order-canceled');
Route::resource('order' , OrderController::class);

/** Transaction Route */
Route::get('transaction' , [TransactionController::class , 'index'])->name('transaction');

/** Setting Route */
Route::get('settings' , [SettingController::class , 'index'])->name('setting.index');
Route::put('general-setting-update' , [SettingController::class , 'generalSettingUpdate'])->name('general-setting-update');
Route::put('email-configration-update' , [SettingController::class , 'EmailConfigrationUpdate'])->name('email-configration-update');
Route::get('setting-change-view-list' , [SettingController::class , 'changeViewList'])->name('setting-change-view-list');

/** Home Page Setting Route */
Route::get('home-page-setting' , [HomePageSettingController::class , 'index'])->name('home-page-setting');
Route::put('popular-category-section' , [HomePageSettingController::class , 'updatePopularCategorySection'])->name('popular-category-section');
Route::put('product-slider-section-one' , [HomePageSettingController::class , 'updateProductSliderSectionOne'])->name('product-slider-section-one');
Route::put('product-slider-section-two' , [HomePageSettingController::class , 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three' , [HomePageSettingController::class , 'updateProductSliderSectionThree'])->name('product-slider-section-three');

/** Advertisement Routes */
Route::get('advertisement' , [AdvertisementController::class , 'index'])->name('advertisement.index');
Route::get('advertisement-change-view-list' , [AdvertisementController::class , 'changeViewList'])->name('advertisement-change-view-list');
Route::put('advertisement/homepage-banner-section-one' , [AdvertisementController::class , 'homepageBannerSectionOne'])->name('homepage-banner-section-one');
Route::put('advertisement/homepage-banner-section-two' , [AdvertisementController::class , 'homepageBannerSectionTwo'])->name('homepage-banner-section-two');

/** Subscriber Route */
Route::get('subscriber' , [SubscriberController::class , 'index'])->name('subscriber.index');
Route::delete('subscriber/{id}' , [SubscriberController::class , 'destroy'])->name('subscriber.destroy');
Route::post('subscriber-send-mail' , [SubscriberController::class , 'sendEmail'])->name('subscriber-send-mail');

/** Footer Info Route */
Route::get('footer-info' , [FooterInfoController::class , 'index'])->name('footer-info.index');
Route::put('footer-info-update/{id}' , [FooterInfoController::class , 'update'])->name('footer-info.update');

/** Footer Socials Route */
Route::put('footer-social/change-status',[FooterSocialsController::class , 'changeStatus'])->name('footer-social.change-status');
Route::resource('footer-social' , FooterSocialsController::class);

/** Footer Grid Two Route */
Route::put('footer-grid-two/change-status',[FooterGridTwoController::class , 'changeStatus'])->name('footer-grid-two.change-status');
Route::put('footer-grid-two/change-title',[FooterGridTwoController::class , 'changeGridTwoTitle'])->name('footer-grid-two-title.update');
Route::resource('footer-grid-two' , FooterGridTwoController::class);

/** Footer Grid Three Route */
Route::put('footer-grid-three/change-status',[FooterGridThreeController::class , 'changeStatus'])->name('footer-grid-three.change-status');
Route::put('footer-grid-three/change-title',[FooterGridThreeController::class , 'changeGridThreeTitle'])->name('footer-grid-three-title.update');
Route::resource('footer-grid-three' , FooterGridThreeController::class);

/** Payment Setting Route */
Route::get('payment-setting' , [PaymentSettingController::class , 'index'])->name('payment-setting.index');
Route::resource('paypal-setting' , PaypalController::class)->only('update');
Route::put('stripe-setting/{id}' , [StripeSettingController::class , 'update'])->name('stripe-setting.update');
Route::put('payir-setting/{id}' , [PayIrSettingController::class , 'update'])->name('payir-setting.update');

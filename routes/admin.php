<?php

// admin route

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CouponsController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\NhaCungCapController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

// admin route
Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');

// profile route
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');

Route::post('profile/update/password',[ProfileController::class,'updatePassword'])->name('password.update');

// contact
Route::resource('contact',ContactController::class);

// slider

Route::resource('slider',SliderController::class);


// category route
Route::put('change-status',[CategoryController::class,'changeStatus'])->name('category.change-status');
Route::resource('category',CategoryController::class);

// brand
Route::resource('brand',BrandController::class);

// product
Route::resource('products',ProductController::class);

Route::put('product/change-status',[ProductController::class,'changeStatus'])->name('product.change-status');

// product image gallery

Route::resource('products-image-gallery',ProductImageGalleryController::class);

// product  variant
Route::put('products-variant/change-status',[ProductVariantController::class,'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant',ProductVariantController::class);


// product variant item
Route::get('products-variant-item/{productId}/{variantId}',[ProductVariantItemController::class,'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}',[ProductVariantItemController::class,'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[ProductVariantItemController::class,'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}',[ProductVariantItemController::class,'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}',[ProductVariantItemController::class,'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}',[ProductVariantItemController::class,'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status',[ProductVariantItemController::class,'changeStatus'])->name('products-variant-item.changes-status');

// review route
Route::get('review', [AdminReviewController::class,'index'])->name('review.index');
Route::put('review/change-status',[AdminReviewController::class,'changeStatus'])->name('review.change-status');
// ncc
Route::resource('nhacungcap',NhaCungCapController::class);

// blog
Route::resource('blog',BlogController::class);

// flash sale

Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change',[FlashSaleController::class, 'changeShowAtHomeStatus'])
->name('flash-sale.show_at_home.change-status');

Route::put('flash-sale-status',[FlashSaleController::class, 'changeStatus'])
->name('flash-sale-status');
Route::delete('flash-sale/{id}',[FlashSaleController::class, 'destroy'])
->name('flash-sale.destroy');


// setting

Route::get('settings',[SettingsController::class,'index'])->name('setting.index');
Route::put('generale-setting-update',[SettingsController::class,'generalSettingUpdate'])->name('generale-setting-update');

// coupon

Route::resource('coupons',CouponsController::class);
// Route::put('coupons/change-status',[CouponsController::class, 'changeStatus'])
// ->name('coupons.change-status');


//order
Route::resource('order',OrderController::class);

Route::get('order-status',[OrderController::class, 'changeOrderStatus'])->name('order.status');

Route::get('payment-status',[OrderController::class, 'changePaymentStatus'])->name('payment.status');


Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');

Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');
// // home page setting
// Route::get('home-page-setting',[OrderController::class, 'index'])->name('home-page-setting');

// manage user
Route::get('manage-user',[ManageUserController::class, 'index'])->name('manage-user.index');
Route::post('manage-user',[ManageUserController::class, 'create'])->name('manage-user.create');

// manage  admin list
Route::get('admin-list',[AdminListController::class, 'index'])->name('admin-list.index');
Route::put('admin-list/status-change',[AdminListController::class, 'changeStatus'])->name('admin-list.status-change');
Route::delete('admin-list/{id}',[AdminListController::class, 'destroy'])->name('admin-list.destroy');

// route customer
Route::get('customers',[CustomerListController::class, 'index'])->name('customers.index');
Route::put('customer/status-change',[CustomerListController::class, 'changeStatus'])->name('customer.status-change');
// shipping

Route::resource('shipping-rule',ShippingRuleController::class);
Route::put('shipping-rule/change-status',[ShippingRuleController::class, 'changeStatus'])
->name('shipping-rule.change-status');


//advertisement route
Route::get('advertisement',[AdvertisementController::class, 'index'])->name('advertisement.index');
Route::put('advertisement/home-page-banner-section-one',[AdvertisementController::class, 'homePageBannerSectionOne'])->name('homepage-banner-section-one');
Route::put('advertisement/home-page-banner-section-two',[AdvertisementController::class, 'homepageBannerSectionTwo'])->name('homepage-banner-section-two');

// payment settings
Route::put('cod-setting/{id}',[CodSettingController::class, 'update'])->name('cod-setting.update');



?>



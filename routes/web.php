<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CheckOutController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendBLogController;
use App\Http\Controllers\Frontend\FrontendContactController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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

Route::get('/', [HomeController::class,'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');

Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale');

// add to cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart-count');
Route::get('cart-products', [CartController::class, 'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total', [CartController::class, 'cartTotal'])->name('cart.sidebar-product-total');
Route::get('apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');

// blog route
Route::get('blogs',[FrontendBLogController::class, 'index'])->name('blogs.index');


// product  route
Route::get('products',[FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-details/{slug}',[FrontendProductController::class, 'showProduct'])->name('product-details');
Route::get('change-product-list-view',[FrontendProductController::class, 'changListView'])->name('change-product-list-view');

// route contact
Route::resource('contact',FrontendContactController::class);

// Route::get('contact',[PageController::class, 'contact'])->name('contact');

// Route::post('contact',[PageController::class, 'handleContactForm'])->name('handle-contact-form');



Route::group(['middleware'=> ['auth','verified'], 'prefix'=>'user', 'as' => 'user.'],function(){
    Route::get('dashboard',[UserDashboardController::class,'index'])->name('dashboard');
    Route::get('profile',[UserProfileController::class,'index'])->name('profile'); //user profile
    Route::put('profile',[UserProfileController::class,'updateProfile'])->name('profile.update'); //update profile user
    Route::post('profile',[UserProfileController::class,'updatePassword'])->name('profile.update.password'); //update password
    // user address
    Route::resource('address', UserAddressController::class);
    // product review
    Route::post('review', [ReviewController::class, 'create'])->name('review.create');
    // checkout
    Route::get('checkout',[CheckOutController::class,'index'])->name('checkout');
    Route::post('checkout/address-create',[CheckOutController::class,'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit',[CheckOutController::class,'checkOutFormSubmit'])->name('checkout.form-submit');
    Route::get('payment',[PaymentController::class,'index'])->name('payment');

    // code route
    Route::get('cod/payment',[PaymentController::class,'payWithCod'])->name('cod.payment');
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    // route order
    Route::get('orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/show/{id}', [UserOrderController::class, 'show'])->name('orders.show');;

    // product review router
    Route::get('review', [ReviewController::class, 'index'])->name('review.index');
    Route::post('review', [ReviewController::class, 'create'])->name('review.create');

});






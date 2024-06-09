<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{category}', [HomeController::class, 'shopCategory'])->name('shopCategory');
Route::get('/shop/{category}/{subCategory}', [HomeController::class, 'shopSubCategory'])->name('shopSubCategory');
Route::get('/product/{slug}', [ShopController::class, 'productDetails'])->name('productDetails');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::post('/cart', [ShopController::class, 'cartPost'])->name('cartPost');
Route::get('/cart/{id}/remove', [ShopController::class, 'removeCartItem'])->name('removeCartItem');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::post('profile', [AuthController::class, 'profileUpdate'])->name('profileUpdate');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [HomeController::class, 'blogDetails'])->name('blogDetails');
Route::get('checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::post('checkout', [ShopController::class, 'checkoutPost'])->name('checkoutPost');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('services', [HomeController::class, 'services'])->name('services');
Route::get('thankyou', [ShopController::class, 'thankyou'])->name('thankyou');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('forgot-password', [AuthController::class, 'forgotPasswordPost'])->name('forgotPasswordPost');
Route::get('change-password/{token}', [AuthController::class, 'changePassword'])->name('changePassword');
Route::post('change-password/{token}', [AuthController::class, 'changePasswordPost'])->name('changePasswordPost');
Route::post('check-coupon', [ShopController::class, 'checkCoupon'])->name('checkCoupon');

// Exception Route
Route::get('/404', function () {
    return view('exception.404');
})->name('exception');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Product Management
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/{slug}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/{slug}/edit', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/{slug}/delete', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/trash', [ProductController::class, 'trash'])->name('admin.product.trash');
        Route::get('/{slug}/restore', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::get('/{slug}/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });
    // Category Management
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{slug}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/{slug}/edit', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/{slug}/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/trash', [CategoryController::class, 'trash'])->name('admin.category.trash');
        Route::get('/{slug}/restore', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('/{slug}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
    // Sub Category Management
    Route::prefix('subcategory')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('admin.subcategory');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
        Route::post('/create', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
        Route::get('/{slug}/edit', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
        Route::put('/{slug}/edit', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
        Route::get('/{slug}/delete', [SubCategoryController::class, 'delete'])->name('admin.subcategory.delete');
        Route::get('/trash', [SubCategoryController::class, 'trash'])->name('admin.subcategory.trash');
        Route::get('/{slug}/restore', [SubCategoryController::class, 'restore'])->name('admin.subcategory.restore');
        Route::get('/{slug}/destroy', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');
    });
    // Account Management
    Route::prefix('account')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.account');
        Route::get('/create', [UserController::class, 'create'])->name('admin.account.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.account.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.account.edit');
        Route::put('/{id}/edit', [UserController::class, 'update'])->name('admin.account.update');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('admin.account.delete');
        Route::get('/trash', [UserController::class, 'trash'])->name('admin.account.trash');
        Route::get('/{id}/restore', [UserController::class, 'restore'])->name('admin.account.restore');
        Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('admin.account.destroy');
    });
    // Coupon Management
    Route::prefix('coupon')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('admin.coupon');
        Route::get('/create', [CouponController::class, 'create'])->name('admin.coupon.create');
        Route::post('/create', [CouponController::class, 'store'])->name('admin.coupon.store');
        Route::get('/{code}/edit', [CouponController::class, 'edit'])->name('admin.coupon.edit');
        Route::put('/{code}/edit', [CouponController::class, 'update'])->name('admin.coupon.update');
        Route::get('/{code}/delete', [CouponController::class, 'delete'])->name('admin.coupon.delete');
    });
});

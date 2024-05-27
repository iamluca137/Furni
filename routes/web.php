<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{category}', [HomeController::class, 'shopCategory'])->name('shopCategory');
Route::get('/shop/{category}/{subCategory}', [HomeController::class, 'shopSubCategory'])->name('shopSubCategory');

Route::get('/about', function () {
    return view('user.about');
})->name('about');
Route::get('/blog', function () {
    return view('user.blog');
})->name('blog');
Route::get('/cart', function () {
    return view('user.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');
Route::get('/services', function () {
    return view('user.services');
})->name('services');

Route::get('/thankyou', function () {
    return view('user.thankyou');
})->name('thankyou');
Route::get('/login', function () {
    return view('user.login');
})->name('login');
Route::get('/register', function () {
    return view('user.register');
})->name('register');
Route::get('/forgot-password', function () {
    return view('user.forgot-password');
})->name('forgot-password');
Route::get('/reset-password', function () {
    return view('user.reset-password');
})->name('reset-password');
Route::get('/product-details', function () {
    return view('user.product-details');
})->name('product-details');


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
});

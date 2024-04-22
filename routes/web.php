<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('user.home');
})->name('home');
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
Route::get('/shop', function () {
    return view('user.shop');
})->name('shop');
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
    // Tag Management
    Route::prefix('tag')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tag');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tag.create');
        Route::post('/create', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
        Route::put('/{id}/edit', [TagController::class, 'update'])->name('admin.tag.update');
        Route::get('/{id}/delete', [TagController::class, 'destroy'])->name('admin.tag.delete');
    });
});

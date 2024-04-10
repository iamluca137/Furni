<?php

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
    Route::get('/product', function () {
        return view('admin.products.list');
    })->name('admin.product');
    Route::get('product/create', function () {
        return view('admin.products.add');
    })->name('admin.product.create');
    Route::get('product/edit', function () {
        return view('admin.products.edit');
    })->name('admin.product.edit');
    Route::get('/category', function () {
        return view('admin.categories.list');
    })->name('admin.category');
    Route::get('category/create', function () {
        return view('admin.categories.add');
    })->name('admin.category.create');
    Route::get('category/edit', function () {
        return view('admin.categories.edit');
    })->name('admin.category.edit');

    Route::get('/account', [UserController::class, 'index'])->name('admin.account');

    Route::get('account/create', [UserController::class, 'create'])->name('admin.account.create');
    Route::post('account/create', [UserController::class, 'store'])->name('admin.account.store');
    Route::get('account/edit/{id}', [UserController::class, 'edit'])->name('admin.account.edit');
    Route::put('account/edit/{id}', [UserController::class, 'update'])->name('admin.account.update');
    Route::get('account/delete/{id}', [UserController::class, 'delete'])->name('admin.account.delete');
    Route::get('account/trash', [UserController::class, 'trash'])->name('admin.account.trash');
    Route::get('account/restore/{id}', [UserController::class, 'restore'])->name('admin.account.restore');
    Route::get('account/destroy/{id}', [UserController::class, 'destroy'])->name('admin.account.destroy');

    Route::get('/tag', function () {
        return view('admin.tags.list');
    })->name('admin.tag');
    Route::get('tag/create', function () {
        return view('admin.tags.add');
    })->name('admin.tag.create');
    Route::get('tag/edit', function () {
        return view('admin.tags.edit');
    })->name('admin.tag.edit');
});

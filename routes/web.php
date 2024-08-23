<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    // Route::get('/homeproduct', [ProductController::class, 'homePaginationProduct'])->name('home.products');
    Route::get('/product/{id}', 'show')->name('product.description');
    Route::post('/products/applyfilter', 'filter')->name('products.filter');
        
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('/send-mail/', [MailController::class, 'index'])->name('mails.send');

});


// admin routes
Route::middleware('auth', 'admin')->group(function () {
    Route::prefix('admin/dashboard')->group(function () {
        Route::controller(AdminController::class)->group(function () {

            Route::get('/', 'index')->name('admin.dashboard');

            Route::get('/products', 'products')->name('admin.products');
            Route::get('/product/add', 'addProduct')->name('admin.product.add');
            Route::post('/product/add', 'storeProduct')->name('admin.product.store');
            Route::get('/product/update/{id}', 'updateForm')->name('admin.product.updateForm');
            Route::put('/product/update/{id}', 'update')->name('admin.product.update');
            Route::delete('/product/delete/{id}', 'destroyProduct')->name('admin.product.delete');

            Route::get('/customers', 'customers')->name('admin.customers');
            Route::put('/customers/change-role/{id}', 'changeRole')->name('admin.customers.change-role');
            Route::put('/customers/change-status/{id}', 'changeStatus')->name('admin.customers.change-status');
            Route::get('/customers', 'customers')->name('admin.customers');
            Route::get('/orders', 'orders')->name('admin.orders');
        });
    });
});


Route::get('/test', function () {
    return view('pages.test');
});
require __DIR__ . '/auth.php';

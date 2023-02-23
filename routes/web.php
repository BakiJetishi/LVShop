<?php

use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('home', [
        'items' => Products::latest()->take(6)->get()
    ]);
});

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/admin/create', [ProductsController::class, 'create'])->middleware('auth', 'isAdmin');
Route::post('/admin/products', [ProductsController::class, 'store'])->middleware('auth', 'isAdmin');
Route::get('/admin/products/{product}/edit', [ProductsController::class, 'edit'])->middleware('auth', 'isAdmin');
Route::put('/products/{product}', [ProductsController::class, 'update'])->middleware('auth', 'isAdmin');
Route::get('/admin/product/{product}/delete', [ProductsController::class, 'destroy'])->middleware('auth', 'isAdmin');
Route::get('/admin/products', [ProductsController::class, 'manage'])->middleware('auth', 'isAdmin');
Route::get('/products/{product}', [ProductsController::class, 'show']);

Route::post('/cart/order', [OrdersController::class, 'store'])->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/categories', [CategoriesController::class, 'manage']);
    Route::get('/category/create', [CategoriesController::class, 'create']);
    Route::post('/category', [CategoriesController::class, 'store']);
    Route::get('/category/{category}/edit', [CategoriesController::class, 'edit']);
    Route::put('/category/{category}', [CategoriesController::class, 'update']);
    Route::get('/category/{category}/delete', [CategoriesController::class, 'destroy']);
});

Route::get('/account', [DashboardController::class, 'account']);
Route::get('/account/security', [DashboardController::class, 'security']);
Route::post('/account/changepassword', [DashboardController::class, 'updatePassword']);
Route::post('/account/changeinfo', [DashboardController::class, 'updateProfile']);

Route::post('/products/category', [CategoriesController::class, 'find']);

Route::get('/cart', function () {
    return view('components.cart', [
        'items' => json_decode(request()->cookie('cart'), true) ?? [],
        'subtotal' => json_decode(request()->cookie('subtotal'), true) ?? 0
    ]);
});

Route::get('/cart/checkout', function () {
    return view('components.checkout', [
        'items' => json_decode(request()->cookie('cart'), true) ?? [],
        'subtotal' => json_decode(request()->cookie('subtotal'), true) ?? 0
    ]);
})->middleware('auth');

Route::post('/cart/product', [CookieController::class, 'setCookie']);
Route::get('/cart/get', [CookieController::class, 'getCookie']);
Route::get('/cart/remove', [CookieController::class, 'removeCookie']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'submit']);
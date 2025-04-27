<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSave')->name('register.save');
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');
    });

    Route::middleware('auth')->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::get('profile', 'profile')->name('profile');
        Route::put('profile', 'updateProfile')->name('profile.update');
        Route::put('password', 'updatePassword')->name('password.update');
    });
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');

    Route::middleware('auth')->group(function () {
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
    });

    Route::get('/products/{product}', 'show')->name('products.show');

    Route::middleware('auth')->group(function () {
        Route::get('/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });
});

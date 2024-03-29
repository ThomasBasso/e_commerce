<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('default');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/products', [ProductsController::class, 'productsIndex'])->name('admin.products.index');
    Route::get('admin/products/new', [ProductsController::class, 'createProduct'])->name('admin.products.new');
    Route::post('admin/products/new', [ProductsController::class, 'storeProduct'])->name('admin.products.store');
    Route::delete('admin/products/{product}', [ProductsController::class, 'destroyProduct'])->name('admin.products.destroy');
    Route::get('admin/products/{product}', [ProductsController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('admin/products/{product}', [ProductsController::class, 'updateProduct'])->name('admin.products.update');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/catalog', [ProductsController::class, 'catalogIndex'])->name('catalog.index');
    Route::get('/catalog/{product}', [ProductsController::class, 'showProduct'])->name('catalog.product');
});

require __DIR__.'/auth.php';

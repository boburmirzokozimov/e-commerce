<?php

use App\Http\Controllers\ProfileController;
use App\Modules\Category\Http\Controller\CategoryController;
use App\Modules\Order\Http\Controller\OrderController;
use App\Modules\Product\Http\Controller\ProductController;
use App\Modules\Tag\Http\Controller\TagController;
use App\Modules\User\Http\Controller\AdminController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');

    Route::get('/admin/orders/partials', [OrderController::class, 'partials'])->name('orders.partials');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/admin/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/admin/tags', [TagController::class, 'index'])->name('tags');
    Route::post('/admin/tags', [TagController::class, 'store'])->name('tags.store');
    Route::put('/admin/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/admin/tags/{tag}', [TagController::class, 'destroy'])->name('tags.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

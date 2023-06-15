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

    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');

    Route::get('/admin/tags', [TagController::class, 'index'])->name('tags');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

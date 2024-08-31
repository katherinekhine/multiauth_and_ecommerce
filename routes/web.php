<?php

use App\Http\Controllers\AvailableController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserHomeController::class, 'index']);
Route::get('/shopping-cart', [ShoppingCartController::class, 'index'])->name('shopping-cart');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::resource('admin/brands', BrandController::class)->middleware(['auth', 'admin']);
Route::resource('admin/categories', CategoryController::class)->middleware(['auth', 'admin']);
Route::post('admin/products/createFromPurchase', [ProductController::class, 'storeFromPurchase'])->name('storeFromPurchase')->middleware(['auth', 'admin']);
Route::resource('admin/products', ProductController::class)->middleware(['auth', 'admin']);
Route::resource('admin/availables', AvailableController::class)->middleware(['auth', 'admin']);
Route::resource('admin/purchases', PurchaseController::class)->middleware(['auth', 'admin']);

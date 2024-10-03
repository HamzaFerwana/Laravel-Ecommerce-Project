<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::prefix('famms')->name('famms.')->group(function () {

    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('about', [SiteController::class, 'about'])->name('about');
    Route::get('products', [SiteController::class, 'products'])->name('products');
    Route::get('/my-cart', [SiteController::class, 'my_cart'])->middleware('auth')->name('my-cart');
    Route::get('product/{name}', [SiteController::class, 'single_product'])->middleware('auth')->name('single-product');
    Route::post('add-to-cart/{id}', [SiteController::class, 'add_to_cart'])->name('add-to-cart')->middleware('auth');
    Route::get('remove-from-cart/{id}', [SiteController::class, 'remove_from_cart'])->name('remove-from-cart')->middleware('auth');
    Route::get('checkout/{total}', [SiteController::class, 'checkout'])->name('checkout')->middleware('auth');
    Route::get('checkout-result', [SiteController::class, 'checkout_result'])->name('checkout-result')->middleware('auth');
    Route::get('purchases', [SiteController::class, 'purchases'])->name('purchases')->middleware('auth');
});

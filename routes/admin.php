<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Middleware\CheckUserType;

Route::prefix('admin')->name('admin.')->middleware(CheckUserType::class, 'auth')->group(function () {

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::resource('sliders', SliderController::class);
Route::get('sliders-bg-image', [SliderController::class, 'sliders_bg_image'])->name('sliders-bg-image');
Route::post('sliders-bg-image-data', [SliderController::class, 'sliders_bg_image_data'])->name('sliders-bg-image-data');
Route::resource('about', AboutController::class);
Route::resource('products', ProductController::class);

Route::post('notify', [AdminController::class, 'notify'])->name('notify');


});

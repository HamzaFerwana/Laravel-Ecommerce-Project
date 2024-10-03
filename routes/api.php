<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;




Route::prefix('v1')->name('api.')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class);
});

Route::post('v1/login', [ProductController::class, 'login']);


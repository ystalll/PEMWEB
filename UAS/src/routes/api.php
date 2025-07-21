<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix('tests')->middleware('apikey')->group(function () {
    Route::get('/', [TestController::class, 'index']);
    Route::post('/decrypt', [TestController::class, 'decryptResponse']); // opsional jika kamu punya fitur ini
    Route::get('{id}', [TestController::class, 'show']);
    Route::post('/', [TestController::class, 'store']);
    Route::put('{id}', [TestController::class, 'update']);
    Route::delete('{id}', [TestController::class, 'destroy']);
});

Route::prefix('products')->middleware('apikey')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/decrypt', [ProductController::class, 'decryptResponse']);
    Route::get('{id}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('{id}', [ProductController::class, 'update']);
    Route::delete('{id}', [ProductController::class, 'destroy']);
});

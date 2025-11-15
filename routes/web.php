<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.list');
});

Route::get('/products', [ProductController::class, 'getProductList'])->name('products.list');
Route::get('/products/create', [ProductController::class, 'getProductCreate'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'postProductStore'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'getProductShow'])->name('products.view');

Route::get('/products/{id}/edit', [ProductController::class, 'getProductEdit'])->name('products.edit');
Route::put('/products/{id}/update', [ProductController::class, 'putProductUpdate'])->name('products.update');
Route::delete('/products/{id}/delete', [ProductController::class, 'deleteProduct'])->name('products.delete');
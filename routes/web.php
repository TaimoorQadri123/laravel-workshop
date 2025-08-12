<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('register');
});



Route::get('/product', [ProductController::class, 'index'])->name('product.index');




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('website.welcome');
});


Route::get('/admin', function () {
    return view('admin.index');
});

//Category Routing
Route::get('/category',[CategoryController::class,'Index'])->name('category.index');
Route::post('/categorystore',[CategoryController::class,'store'])->name('category.store');
Route::get('/categorydelete/{id}',[CategoryController::class,'delete'])->name('category.delete');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/store',[CategoryController::class,'update'])->name('category.store');


//Product Routing


Route::get('/product',[ProductController::class,'Index'])->name('product.index');

Route::get('/product/add',[ProductController::class,'showCategory'])->name('product.add');



// Route::post('/categorystore',[ProductController::class,'store'])->name('product.store');
// Route::get('/categorydelete/{id}',[ProductController::class,'delete'])->name('product.delete');
// Route::get('/category/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
// Route::post('/category/store',[ProductController::class,'update'])->name('product.store');

// Login Route
Route::get('/login',[RegisterController::class,'login'])->name('website.login');
Route::post('/login',[RegisterController::class,'loginfunction'])->name('website.login');


// Logout Route

Route::get('/logout',[RegisterController::class,'logout']);



//Register Route
Route::get('/register',[RegisterController::class,'register'])->name('website.register');
Route::post('/register',[RegisterController::class,'registerusers'])->name('website.register');


Route::get('/users', function () {
    return view('users');
});



// Route::get('/users',[RegisterController::class,'register']);


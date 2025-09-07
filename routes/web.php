<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
Route::get('/', function () {
    return view('website.welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});


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


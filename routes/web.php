<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CategoryController::class, 'index'])->name('home');

// Route::get('/categories', function () {
//     $categories = Category::all();
//     return view('categories', ['categories' => $categories]);
// });
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories', ['categories' => $categories]);
});
<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get("/login", [AuthController::class, 'index'])->name('login')->middleware('noAuth');
Route::post("/login", [AuthController::class, 'authenticate']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::prefix("product")->group(function(){
    Route::get("/", [ProductController::class, 'all']);
    Route::get("/add", [ProductController::class, 'add']);
    Route::get("/detail/{id}", [ProductController::class, 'detail']);
    
    Route::post("/create", [ProductController::class, 'create']);
    Route::put("/update/{id}", [ProductController::class, 'update']);
    Route::get("/delete/{id}", [ProductController::class, 'delete']);
});

Route::prefix("blog")->group(function(){
    Route::get("/", [PostController::class, 'all']);
    Route::get("/add", [PostController::class, 'add']);
    Route::get("/detail/{id}", [PostController::class, 'detail']);
    
    Route::post("/create", [PostController::class, 'create']);
    Route::put("/update/{id}", [PostController::class, 'update']);
    Route::get("/delete/{id}", [PostController::class, 'delete']);
});
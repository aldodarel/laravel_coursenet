<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UserController;


// http://localhost:8000/
Route::get("/", [HomeController::class, 'index']);

Route::get("/about", [HomeController::class, 'about']);

Route::get("/register", [RegistrasiController::class, 'register']);

//  http://localhost:8000/product/samsung/galaxy => Product dengan brand samsung dan seri galaxy
//  http://localhost:8000/product/oppo/b9000 => Product dengan brand oppo dan seri b9000

Route::get("/product/{brand}",
[HomeController::class, 'product'])->where('brand', 'samsung|asus|oppo|lenovo|macbook');

Route::get("/produktoko/{brand}",[HomeController::class, 'product'])->where('brand', 'samsung|asus|oppo|lenovo|macbook');

Route::get("product/{hp}/{seri}", [HomeController::class, 'productDetail']);

Route::get("/welcomee", [HomeController::class, 'welcome']);

Route::get("tambah-user", [UserController::class, 'user']);

Route::post("save-user", [UserController::class, 'save']);

Route::post("calculator", [UserController::class, 'operator']);
Route::get("calculator", [UserController::class, 'hitung']);

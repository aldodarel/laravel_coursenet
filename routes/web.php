<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


// http://localhost:8000/
Route::get("/", [HomeController::class, 'index'])->middleware("auth");
Route::get("/home", [HomeController::class, 'index'])->middleware("auth"); // untuk mendirect ketika sudah login dan ketik route '/login' kembali

Route::get("/about", [HomeController::class, 'about']);

Route::get("/register", [RegistrasiController::class, 'register']);

//  http://localhost:8000/product/samsung/galaxy => Product dengan brand samsung dan seri galaxy
//  http://localhost:8000/product/oppo/b9000 => Product dengan brand oppo dan seri b9000

Route::get("/product/{brand}",[HomeController::class, 'product'])->where('brand', 'samsung|asus|oppo|lenovo|macbook');
Route::get("/produktoko/{brand}",[HomeController::class, 'product'])->where('brand', 'samsung|asus|oppo|lenovo|macbook');
Route::get("product/{hp}/{seri}", [HomeController::class, 'productDetail']);
Route::get("/welcomee", [HomeController::class, 'welcome']);


Route::get("tambah-user", [UserController::class, 'user']);
Route::post("save-user", [UserController::class, 'save']);
Route::post("calculator", [UserController::class, 'operator']);
Route::get("calculator", [UserController::class, 'hitung']);
Route::get("list-user", [UserController::class, 'lists'])->middleware("auth"); // rutenya hanya boleh diakses kalau sudah login
// 1. login
// 2. buka list user -> sukses
// 3. logout
// 4. buka list user -> gagal dan pindah ke halaman login

Route::post("delete-user", [UserController::class, 'delete'])->middleware("auth");
Route::post("update-user", [UserController::class, 'edit'])->middleware("auth");
Route::get("update-user/{id}", [UserController::class, 'update'])->middleware("auth");
Route::get("pdf-user", [UserController::class, 'filepdf'])->middleware("auth");
Route::get("/excel-user", [UserController::class, 'fileexcel'])->middleware("auth");


// Route untuk Login Page
// login hanya bisa diakses kalai belum login
Route::get("login", [LoginController::class, "index"])->name("login")->middleware("guest"); // rutenya hanya boleh diakses kalau belum login
// 1. login
// 2. akses alamat/login -> gagal
// 3. logout -> page login
Route::post("proses-login", [LoginController::class, "signin"])->middleware("guest");
Route::get("logout", [LoginController::class, "signout"])->middleware("auth");

// list user hanya bisa kita akses kalau sudah login







<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// buat function API Postman
// http://localhost:8000/api/v1
Route::get("/v1", function() {
    return response()->json(
        [
            'status' => true,
            'time' => date("Y-m-d H:i:s"),
            'message' => 'Hello from API v1'
        ]
    );
});

// CRUD
// tambah member
Route::post('/v1/member', [MemberApiController::class, "add"]);

// READ Member
Route::get('/v1/member', [MemberApiController::class, "list"]);

// UPDATE Member
Route::put('/v1/member', [MemberApiController::class, "edit"]);

// DELETE Member
Route::delete('/v1/member/{id}', [MemberApiController::class, "remove"]);


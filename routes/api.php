<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
Route::post('changePassword',[UserController::class,'changePassword'])->middleware('auth:sanctum');
Route::get('getProfile',[UserController::class,'getProfile'])->middleware('auth:sanctum');
Route::post('updateProfile',[UserController::class,'updateProfile'])->middleware('auth:sanctum');
//Route::get('deleteAccount',[UserController::class,'deleteAccount'])->middleware('auth:sanctum');

//company
Route::post('registerCompany',[CompanyController::class,'register']);
Route::post('loginCompany',[CompanyController::class,'login']);
Route::post('logoutCompany',[CompanyController::class,'logout'])->middleware(['auth:sanctum','CheckCompany']);


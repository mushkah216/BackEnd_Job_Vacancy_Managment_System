<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavouriteJobController;
use App\Http\Controllers\JobbController;
use App\Http\Controllers\SavedJobController;
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
Route::get('profileCompany',[CompanyController::class,'getProfile'])->middleware(['auth:sanctum','CheckCompany']);
Route::post('updateProfileCom',[CompanyController::class,'updateProfile'])->middleware(['auth:sanctum','CheckCompany']);


//job-company
Route::middleware(['auth:sanctum','CheckCompany'])->prefix('company')->group(function(){
    Route::post('jobs',[JobbController::class,'addJob']);
    Route::get('jobs',[JobbController::class,'getJobs']);
    Route::get('job/{jobId}',[JobbController::class,'getJob']);
    Route::put('job/{jobId}',[JobbController::class,'updateJob']);
    Route::delete('job/{jobId}',[JobbController::class,'deleteJob']);
});
//job-user
Route::middleware('auth:sanctum')->prefix('jobs')->group(function(){
    Route::get('',[JobbController::class,'showAllJob']);
    Route::get('{jobId}',[JobbController::class,'showJob']);
});
//favourit
Route::middleware('auth:sanctum')->prefix('favourite')->group(function(){
    Route::post('{jobId}',[FavouriteJobController::class,'addToFavourite']);
    Route::delete('{jobId}',[FavouriteJobController::class,'removeFromFavourite']);
    Route::get('',[FavouriteJobController::class,'getFavouriteJob']);
});
//saved-job
Route::middleware('auth:sanctum')->prefix('savedJob')->group(function(){
    Route::post('{jobId}',[SavedJobController::class,'addToSavedJob']);
    Route::delete('{jobId}',[SavedJobController::class,'removeFromSavedJob']);
    Route::get('',[SavedJobController::class,'getSavedJob']);
});
//user-application
Route::middleware('auth:sanctum')->prefix('app')->group(function(){
    Route::post('applay',[ApplicationController::class,'applay']);
    Route::get('myApp',[ApplicationController::class,'getApplays']);
    Route::get('detail/{appId}',[ApplicationController::class,'showDetails']);
    Route::delete('app/{appId}',[ApplicationController::class,'removeApp']);
});
//company-application
Route::middleware(['auth:sanctum','CheckCompany'])->prefix('companyApp')->group(function(){
    Route::get('all',[ApplicationController::class,'getAllApplication']);
    Route::post('accept/{appId}',[ApplicationController::class,'acceptApplication']);
    Route::post('reject/{appId}',[ApplicationController::class,'rejectApplication']);
});


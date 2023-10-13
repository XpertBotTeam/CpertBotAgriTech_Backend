<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DiseaseController;
use App\Http\Controllers\API\DiseasePhotoController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\RecommendationController;
use App\Http\Controllers\API\knowledgeBase;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\PhotoController;
use App\Http\Controllers\API\VideoController;

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

Route::resource('diseases',DiseaseController::class);
Route::resource('reports',ReportController::class);
Route::resource('recommendations',RecommendationController::class);
Route::resource('knowledgeBase',knowledgeBase::class);
Route::resource('disease-photo',DiseasePhotoController::class);
Route::resource('location',LocationController::class);
Route::resource('video',VideoController::class);
Route::resource('photo',PhotoController::class);

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('update_Password',[AuthController::class,'update_Password'])->middleware('auth:sunctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DiseaseController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\RecommendationController;
use App\Http\Controllers\API\knowledgeBase;

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

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

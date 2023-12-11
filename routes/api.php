<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->controller(HomeController::class)->group(function () {
    Route::prefix('create')->group(function(){
        Route::post("/country", 'createCountry');
        Route::post("/city", 'createCity');
        Route::post("/population", 'createPopulation');
    });
    Route::post("/logout", [AuthController::class, 'logout']);
});

Route::get('countries', [HomeController::class, 'countries']);
Route::get('cities', [HomeController::class, 'cities']);
Route::get('report', [HomeController::class, 'report']);
Route::post("login", [AuthController::class, 'login']);

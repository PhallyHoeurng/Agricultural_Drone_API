<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Models\Image;
use App\Models\Location;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//--------- User API ---------//
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);

// Create logout
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/plans', [PlanController::class, 'store']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});

Route::post('/login', [AuthenticationController::class, 'login']);

//--------- Plan API ---------//
Route::get('/plans', [PlanController::class, 'index']);
Route::get('/plans/{name}', [PlanController::class, 'show']);

// Route::post('/plans/{id}', [PlanController::class, 'show']);
Route::delete('/drone/{id}', [DroneController::class, 'destroy']);

Route::post('/plans/{id}', [PlanController::class, 'show']);

//--------- Drone API ---------//
Route::get('/drones', [DroneController::class, 'index']);
Route::post('/drone', [DroneController::class, 'store']);
Route::get('/drone/{name}', [DroneController::class,'show']);
Route::get('/drone/{name}/location', [DroneController::class, 'ShowCurrentLocation']);
Route::put('/drone/{name}', [DroneController::class, 'update']);
Route::delete('/drone/{id}', [DroneController::class, 'destroy']);

//--------- Location API ---------//
Route::get('/locations', [LocationController::class, 'index']);
Route::post('/location', [LocationController::class, 'store']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::put('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);

//--------- Map API ---------//
Route::get('/maps', [MapController::class, 'index']);
Route::post('/map', [MapController::class, 'store']);
Route::post('/maps/{address}/{id}', [MapController::class, 'addMapImage']);
Route::get('/downloadImageFarm/{address}/{id}', [MapController::class, 'downdLoadImageFarm']);
Route::delete('/deleteImageFarm/{address}/{id}', [MapController::class, 'deleteImageFarm']);

//--------- Farm API ---------//
Route::get('/farms', [FarmController::class, 'index']);
Route::post('/farm', [FarmController::class, 'store']);


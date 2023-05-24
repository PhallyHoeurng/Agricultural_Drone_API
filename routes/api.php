<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\LocationController;
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

// Create on user api

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);



///drone  api routes
Route::get('/drones', [DroneController::class, 'index']);
Route::post('/drone', [DroneController::class, 'store']);
Route::get('/drone/{id}', [DroneController::class, 'show']);
Route::put('/drone/{id}', [DroneController::class, 'update']);
Route::delete('/drone/{id}', [DroneController::class, 'destroy']);

// location api routes
Route::get('/drones/{name}/location', [DroneController::class, 'ShowCurrentLocation']);

// location api routes
Route::get('/locations', [LocationController::class, 'index']);
Route::post('/location', [LocationController::class, 'store']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::put('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);
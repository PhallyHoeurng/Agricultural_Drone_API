<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
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



///drone 
Route::get('/drones', [DroneController::class, 'index']);
Route::post('/drone', [DroneController::class, 'store']);
Route::get('/drone/{id}', [DroneController::class, 'show']);
Route::put('/drone/{id}', [DroneController::class, 'update']);
Route::delete('/drone/{id}', [DroneController::class, 'destory']);

// Create role
Route::post('/roles', [RoleController::class, 'store']);


// Create plans
Route::get('/plans', [PlanController::class, 'index']);
Route::post('/plans', [PlanController::class, 'store']);
Route::post('/plans/{id}', [PlanController::class, 'show']);

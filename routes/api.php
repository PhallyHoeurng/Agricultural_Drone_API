<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MapImageController;
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

// Create on user api
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);

// Create role
Route::post('/roles', [RoleController::class, 'store']);


// Create plans
Route::get('/plans', [PlanController::class, 'index']);
Route::post('/plans', [PlanController::class, 'store']);
Route::post('/plans/{name}', [PlanController::class, 'showplan']);

Route::post('/plans/{id}', [PlanController::class, 'show']);
Route::delete('/drone/{id}', [DroneController::class, 'destroy']);

///drone  api routes
Route::get('/drones', [DroneController::class, 'index']);
Route::post('/drone', [DroneController::class, 'store']);
Route::get('/drone/{name}', [DroneController::class,'show']);
Route::get('/drone/{name}/location', [DroneController::class, 'ShowCurrentLocation']);
Route::put('/drone/{name}', [DroneController::class, 'update']);
Route::delete('/drone/{id}', [DroneController::class, 'destory']);

// location api routes
Route::get('/locations', [LocationController::class, 'index']);
Route::post('/location', [LocationController::class, 'store']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::put('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);

// mape api routes
Route::get('/maps', [MapController::class, 'index']);
Route::get('/showall', [MapController::class, 'showall']);
Route::post('/map', [MapController::class, 'store']);
Route::get('/maps/{address}/{id}', [MapController::class, 'show']);
Route::delete('/maps/{address}/{id}', [MapController::class, 'destroy']);

//downloadImageFarm
Route::get('/download_maps/{address}/{id}', [MapController::class, 'downdLoadImageFarm']);
// Route::get('/download_maps/{address}', [MapController::class, 'downdLoadImageFarm']);



// farm api routes
Route::get('/farms', [FarmController::class, 'index']);
Route::post('/farm', [FarmController::class, 'store']);


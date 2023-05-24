<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DroneRequest;
use App\Http\Requests\updateDroneRequest;
use App\Http\Resources\DroneResource;
use App\Models\Drone;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(['success' => true, 'data' => $drones], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        $drone = Drone::store($request);
        return  response()->json(['success' => true, 'data' => $drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($nameDrone)
    {
        $drone = Drone::where('name', $nameDrone)->first();
        if (!$drone) {
            return response()->json(['message' => 'name drone is not found'], 404);
        }
        
        $drone = new DroneResource($drone);
        return response()->json(['success' => true, 'data' => $drone], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateDroneRequest $request, string $name)
    {
        $drone = Drone::where('name', $name)->first();
        if (!$drone) {
            return response()->json(['success' => false, 'message' => 'Drone name not found'], 404);
        }
    
        $drone->update($request->validated());
    
        return response()->json(['success' => true, 'data' => $drone], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $drone = Drone::find($id);
        if(!$drone){
            return response()->json(['message' => 'id drone not found'], 404);
        }

        $drone->delete();
        return  response()->json(['success' => true, 'delete successfuly'], 200);
    }

    public function ShowCurrentLocation(Request $droneName)
    {
        $name = $droneName->route('name');
        $drone = Drone::where('name', $name)->first();
        if (!$drone) {
            return response()->json(['message' => 'Drone not found'], 404);
        } 
    
        return response()->json(['success' => true, 'data' => $drone->locations], 200);
    }
}

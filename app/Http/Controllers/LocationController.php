<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        $location = LocationResource::collection($location);
        return response()->json(['success' => true, 'data' => $location],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        $location = Location::store($request);
        return  response()->json(['success' => true, 'data' => $location], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $location = Location::find($id);
        
        if(!$location){
           return response()->json(['message'=> "location not found"], 404);
        }

        $location = new LocationResource($location);
        return response()->json(['success' => true, 'data' => $location], 200);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, $id)
    {

        $location = Location::store($request, $id);
        return response()->json(['success' => true, 'data' => $location], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = Location::find($id);

        if(!$location){
           return  response()->json(['message'=> "location not found"], 404);
        }

        $location->delete();
        return response()->json(['success' => true, 'message' => 'Data delete successlully!'], 200);
    }

}

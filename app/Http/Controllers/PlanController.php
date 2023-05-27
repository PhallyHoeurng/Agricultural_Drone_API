<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanStoreRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\PlanShowResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plan = Plan::all();
        $plan = PlanResource::collection($plan);
        return response()->json(['success' => true, 'data' => $plan], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanStoreRequest $request)
    {
        //
        $plan = Plan::store($request);
        return response()->json(['success' => true, 'data' => $plan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        //
        $plan = Plan::where('plan_name', $name)->first();
        if (!$plan) {
            return response()->json(['message' => 'name drone is not found'], 404);
        }
        $plan = new PlanShowResource($plan);
        return response()->json(['success' => true, 'data' => $plan], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




}

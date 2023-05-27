<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::all();
        $farms = FarmResource::collection($farms);
        return response()->json(['success' => true, 'data' => $farms], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmRequest $request)
    {
        $farm = Farm::store($request);
        return  response()->json(['success' => true, 'data' => $farm], 200);
    }
}

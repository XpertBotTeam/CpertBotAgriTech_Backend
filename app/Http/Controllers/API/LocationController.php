<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use PgSql\Lob;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $location = Location::all();
        return response()->json($location);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        //
        $location = Location::create($request->all());
        return response()->json($location,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $location = Location::findOrfail($id);
        return response()->json($location);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        //
        $location = Location::findOrFail($id);
        $location->update($request->all());
        return response()->json($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $location = Location::findOrFail($id);
        $location->delete();
        return response()->json($location);
    }
}

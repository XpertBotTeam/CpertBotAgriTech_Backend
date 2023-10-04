<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;
use App\Http\Requests\DiseaseRequest;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page',25);
        $disease = Disease::with('photos')->paginate($per_page);
        return response()->json($disease);

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
    public function store(DiseaseRequest $request)
    {
        $disease = Disease::create($request->all());
        return response()->json($disease,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disease = Disease::findOrfail($id);
        return response()->json($disease);
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
    public function update(Request $request, string $id)
    {
        //
        $disease = Disease::findOrfail($id);
        $disease->update($request->all());
        return response()->json($disease);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disease = Disease::findOrfail($id);
        $disease->delete();
        return response()->json(null,204);

    }
}

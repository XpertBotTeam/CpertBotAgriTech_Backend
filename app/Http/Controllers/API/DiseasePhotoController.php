<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiseasePhotoRequest;
use App\Models\Disease;
use App\Models\DiseasePhoto ;
use Illuminate\Http\Request;

class DiseasePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page',25);
        $photo = DiseasePhoto::paginate($per_page);
        return response()->json($photo);
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
    public function store(DiseasePhotoRequest $request)
    {
        //
        $diseasephoto = DiseasePhoto::create($request->all());
        return response()->json($diseasephoto,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $diseasephoto = DiseasePhoto::findOrfail($id);
        return response()->json($diseasephoto);
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
    public function update(DiseasePhotoRequest $request, string $id)
    {
        //
        $diseasephoto = DiseasePhoto::findOrFail($id);
        $diseasephoto->update($request->all());
        return response()->json($diseasephoto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $diseasephoto = DiseasePhoto::findOrFail($id);
        $diseasephoto->delete();
        return response()->json(null,204);
    }
}

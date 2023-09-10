<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecommendationRequest;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page',25);
        $recommendations = Recommendation::paginate($per_page);
        return response()->json($recommendations);
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
    public function store(RecommendationRequest $request)
    {
        //
        $recommendation = Recommendation::create($request->all());
        return response()->json($recommendation,201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $recommendation = Recommendation::findOrfail($id);
        return response()->json($recommendation);
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
    public function update(RecommendationRequest $request, string $id)
    {
        //
        $recommendation = Recommendation::findOrFail($id);
        $recommendation->update($request->all());
        return response()->json($recommendation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $recommendation = Recommendation::findOrFail($id);
        $recommendation->delete();
        return response()->json(null,204);
    }
}

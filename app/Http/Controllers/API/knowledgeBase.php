<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\knowledgebaserequest;
use App\Models\Knowledge_Base;
use Illuminate\Http\Request;

class knowledgeBase extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page',25);
        $knowledgebase = Knowledge_Base::paginate($per_page);
        return response()->json($knowledgebase);

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
    public function store(Request $request)
    {
        //
        $knowledgebase = Knowledge_Base::create($request->all());
        return response()->json($knowledgebase,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $knowledgebase = Knowledge_Base::findOrfail($id);
        return response()->json($knowledgebase);
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
    public function update(knowledgebaserequest $request, string $id)
    {
        //
        $knowledgebase = Knowledge_Base::findOrFail($id);
        $knowledgebase->update($request->all());
        return response()->json($knowledgebase);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $knowledgebase = Knowledge_Base::findOrFail($id);
        $knowledgebase->delete();
        return response()->json(null,204);
    }
}

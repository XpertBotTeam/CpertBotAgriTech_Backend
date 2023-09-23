<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $videos = Video::all();
        return response()->json($videos);

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
    public function store(VideoRequest $request)
    {
        //
        $video = Video::create($request->all());
        return response()->json($video,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $video = Video::findOrfail($id);
        return response()->json($video);
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
    public function update(VideoRequest $request, string $id)
    {
        //
        $video = Video::findOrFail($id);
        $video->update($request->all());
        return response()->json($video);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $video = Video::findOrFail($id);
        $video->delete();
        return response()->json($video);
    }
}

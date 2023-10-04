<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Google\Cloud\Vision\VisionClient;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page',25);
        $photo = Photo::paginate($per_page);
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
    public function store(PhotoRequest $request)
    {
        //
        // get the photo from the request
        $image = $request->file('image');

        // read the image file contents
        $imageContents = file_get_contents($image->getPathname());

        // initialize the vision api client
       // $vision = new VisionClient();

        // perform safe search detection on the image contents
        // $imagevision = $vision->image($imageContents,[
        //     'SAFE_SEARCH_DETECTION',
        // ]);

        // $annotation = $vision->annotate($imagevision);
        // $safeSearch = $annotation->safeSearch();
        // echo $safeSearch;

        $imageName = time().'.'.$image->getClientOriginalExtension();
        // $imageName = $request->get('name','');


        Storage::putFileAs('public/photos',$image, $imageName);


        // detection



        $image = Photo::create([
            'name' => $imageName,
            'caption' => $request->get('caption', ''),
            'plantName' => $request->get('plantName', ''),
            'image_url' => asset('storage/photos/'.$imageName),
        ]);

        return response()->json($image);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $photo = Photo::findOrfail($id);
        return response()->json($photo);
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
    public function update(PhotoRequest $request, string $id)
    {
        //
        $photo = Photo::findOrFail($id);
        $photo->update($request->all());
        return response()->json($photo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return response()->json(null,204);
    }
}

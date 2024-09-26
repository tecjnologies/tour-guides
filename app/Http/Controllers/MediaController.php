<?php
namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return Media::all();
    }

    public function show($id)
    {
        return Media::findOrFail($id);
    }

    public function store(Request $request)
    {
        $media = Media::create($request->all());
        return response()->json($media, 201);
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $media->update($request->all());
        return response()->json($media, 200);
    }

    public function destroy($id)
    {
        Media::destroy($id);
        return response()->json(null, 204);
    }
}

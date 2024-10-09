<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlacesGallery;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    
    public function index()
    {
        $tourGuides = Place::latest()->paginate(9);
        return view('website.tour-guides-profile', compact('tourGuides'));
    }
    
    public function show($id)
    {
        $destination = Place::with('district','gallery')->findOrFail($id);
        $places = Place::whereNot('id', $id)->get();
        return view('website.destination-details', compact('destination', 'places'));

    }

    public function destroyImage($imageId)
    {
        $image = PlacesGallery::findOrFail($imageId);
        if(Storage::disk('public')->exists('place/'.$image->image)){
            Storage::disk('public')->delete('place/'.$image->image);
        }
        $image->delete();
        return response()->json(['success' => 'Image deleted successfully.']);
    }


}

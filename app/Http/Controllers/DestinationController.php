<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Place;
use App\Models\PlacesGallery;
use App\Models\Placetype;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    
    public function index()
    {
        $placeTypes = Placetype::with('places.district')->latest()->paginate(100);
        return view('website.destinations', compact('placeTypes'));
    }
    
    public function show($id)
    {
        $destination = Place::with('district','gallery')->findOrFail($id);
        $places = Place::whereNot('id', $id)->get();
        $guides = Guide::limit(6)->get();
        return view('website.destination-details', compact('destination', 'places', 'guides'));

    }

    public function showTourDestinations($id)
    {
        $destination = Place::with('district','gallery')->findOrFail($id);
        $places = Place::whereNot('id', $id)->get();
        $tourGuide = Guide::first() ?? [];
        return view('website.tour-destination-details', compact('destination', 'places','tourGuide'));

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

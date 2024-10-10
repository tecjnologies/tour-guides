<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Language;
use App\Models\Place;
use App\Models\Placetype;
use App\Models\TourGuide;
use Illuminate\Http\Request;


class TourGuideController extends Controller
{

    public function index()
    {
        $tourGuides = Guide::with('description')->latest()->paginate(9);
        $places = Place::select('id','name')->get();
        $languages = Language::select('id','name')->get();
        $placeTypes = Placetype::select('id','name')->get();
        $maxPrice = Guide::max('price');
        return view('website.tour-guides-profile', compact('tourGuides','places','languages','placeTypes'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license_id' => 'required|string|max:255',
            'hourly_price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'verified' => 'boolean',
            'approved' => 'boolean',
            'suspended' => 'boolean',
        ]);

        $tourGuide = TourGuide::create($request->all());
        return response()->json($tourGuide, 201);
    }

    public function show($id)
    {
        $tourGuide = Guide::with('activities','guideLanguages','description', 'privateDestinations.district','otherDestinations')->findOrFail($id);
        $places = Place::all() ;
        return view('website.tour-guide-details', compact('tourGuide', 'places'));
    }


    public function search(Request $request)
    {

        $placeId = $request->input('place_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $languageId = $request->input('language_id');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $noOfPeople = $request->input('no_of_people');
        $placeType = $request->input('place_type');
    
        $query = Guide::with(['description', 'places', 'guideLanguages', 'places.placeType']);
    
        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }
    
        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }

         // if ($noOfPeople) {
        //     $query->where('no_of_people', $noOfPeople);
        // }


        if ($languageId) {
            $query->whereHas('guideLanguages', function($q) use ($languageId) {
                $q->where('languages.id', $languageId);
            });
        }
        
        if ($placeId) {
            $query->whereHas('places', function($q) use ($placeId) {
                $q->where('places.id', $placeId);
            });
        }

    
        if ($placeType) {
            $query->whereHas('places.placeType', function($q) use ($placeType) {
                $q->where('placetypes.id', $placeType);
            });
        }
    

        $tourGuides = $query->latest()->paginate(9);
    
        $places = Place::all();
        $languages = Language::all();
        $placeTypes = Placetype::all();
        $maxPrice = Guide::max('price');

        return view('website.tour-guides-profile', compact('tourGuides', 'places', 'languages','placeTypes'));
    }


    public function update(Request $request, $id)
    // public function update(Request $request, TourGuide $tourguide)
    {
        $tourGuide = TourGuide::findOrFail($id);
        
        $request->validate([
            'name' => 'string|max:255',
            'license_id' => 'string|max:255',
            'hourly_price' => 'numeric',
            'country' => 'string|max:255',
            'nationality' => 'string|max:255',
            'verified' => 'boolean',
            'approved' => 'boolean',
            'suspended' => 'boolean',
            // Add validation for other fields as needed
        ]);

        $tourGuide->update($request->all());
        return response()->json($tourGuide);
    }

    public function destroy($id)
    {
        $tourGuide = TourGuide::findOrFail($id);
        $tourGuide->delete();
        return response()->json(null, 204);
    }

  public function showUser($tourGuideId)
    {
        $tourGuide = TourGuide::findOrFail($tourGuideId);
        $user = $tourGuide->user;

        return response()->json($user);
    }
}

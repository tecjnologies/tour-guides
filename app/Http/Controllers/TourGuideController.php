<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\TourGuide;
use Illuminate\Http\Request;


class TourGuideController extends Controller
{

    public function index()
    {
        $tourGuides = Guide::latest()->paginate(9);
        return view('website.tour-guides-profile', compact('tourGuides'));
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
        
        return view('website.tour-guide-details', compact('tourGuide'));
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

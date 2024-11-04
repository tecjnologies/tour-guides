<?php

namespace App\Http\Controllers;

use App\Models\{Place};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function getPlacesByType($placeTypeId)
    {
        $places = Place::where('placetype_id', $placeTypeId)->get();
        return response()->json($places);
    }
  
}

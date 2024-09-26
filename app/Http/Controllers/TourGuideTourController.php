<?php

namespace App\Http\Controllers;

use App\Models\TourGuideTour;
use Illuminate\Http\Request;

class TourGuideTourController extends Controller
{
    public function index()
    {
        return TourGuideTour::all();
    }

    public function show($id)
    {
        return TourGuideTour::findOrFail($id);
    }

    public function store(Request $request)
    {
        $tourGuideTour = TourGuideTour::create($request->all());
        return response()->json($tourGuideTour, 201);
    }

    public function update(Request $request, $id)
    {
        $tourGuideTour = TourGuideTour::findOrFail($id);
        $tourGuideTour->update($request->all());
        return response()->json($tourGuideTour, 200);
    }

    public function destroy($id)
    {
        TourGuideTour::destroy($id);
        return response()->json(null, 204);
    }
}

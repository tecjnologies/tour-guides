<?php
namespace App\Http\Controllers;

use App\Models\TourBooking;
use Illuminate\Http\Request;

class TourBookingController extends Controller
{
    public function index()
    {
        return TourBooking::all();
    }

    public function show($id)
    {
        return TourBooking::findOrFail($id);
    }

    public function store(Request $request)
    {
        $tourBooking = TourBooking::create($request->all());
        return response()->json($tourBooking, 201);
    }

    public function update(Request $request, $id)
    {
        $tourBooking = TourBooking::findOrFail($id);
        $tourBooking->update($request->all());
        return response()->json($tourBooking, 200);
    }

    public function destroy($id)
    {
        TourBooking::destroy($id);
        return response()->json(null, 204);
    }
}

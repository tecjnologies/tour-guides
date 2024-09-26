<?php

namespace App\Http\Controllers;

use App\Models\TourGuide;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="TourGuide",
 *     type="object",
 *     required={"id", "name", "license_id", "hourly_price", "country", "nationality", "verified", "approved", "suspended"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="license_id",
 *         type="string",
 *         example="ETGA12345"
 *     ),
 *     @OA\Property(
 *         property="hourly_price",
 *         type="number",
 *         format="float",
 *         example=50.75
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="United Arab Emirates"
 *     ),
 *     @OA\Property(
 *         property="nationality",
 *         type="string",
 *         example="Egyptian"
 *     ),
 *     @OA\Property(
 *         property="verified",
 *         type="boolean",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="approved",
 *         type="boolean",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="suspended",
 *         type="boolean",
 *         example=false
 *     )
 * )
 */


class TourGuideController extends Controller
{

 /**
     * @OA\Get(
     *     path="/api/tourguides",
     *     summary="List all tour guides",
     *     tags={"Tour Guides"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of tour guides",
     *           @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/TourGuide")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function index()
    {
        $tourGuides = TourGuide::all();
        return response()->json($tourGuides);
    }

    /**
     * @OA\Post(
     *     path="/api/tourguides",
     *     summary="Create a new tour guide. Note: ID will be generated Automatically",
     *     tags={"Tour Guides"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TourGuide")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tour guide created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/TourGuide")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
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
            // Add validation for other fields as needed
        ]);

        $tourGuide = TourGuide::create($request->all());
        return response()->json($tourGuide, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/tourguides/{id}",
     *     summary="Get a single tour guide by ID",
     *     tags={"Tour Guides"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the tour guide",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Details of a single tour guide",
     *         @OA\JsonContent(ref="#/components/schemas/TourGuide")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour guide not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function show($id)
    {
        $tourGuide = TourGuide::findOrFail($id);
        return response()->json($tourGuide);
    }


    /**
     * @OA\Put(
     *     path="/api/tourguides/{id}",
     *     summary="Update an existing tour guide",
     *     tags={"Tour Guides"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the tour guide",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TourGuide")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tour guide updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/TourGuide")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour guide not found"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/tourguides/{id}",
     *     summary="Delete a tour guide",
     *     tags={"Tour Guides"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the tour guide",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Tour guide deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour guide not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function destroy($id)
    {
        $tourGuide = TourGuide::findOrFail($id);
        $tourGuide->delete();
        return response()->json(null, 204);
    }


    /**
     * @OA\Get(
     *     path="/api/tourguides/{id}/user",
     *     summary="Get the user for a tour guide",
     *     description="Retrieve the user associated with the specified tour guide.",
     *     operationId="getTourGuideUser",
     *     tags={"Tour Guides"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the tour guide",
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User associated with the tour guide",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/User"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour guide not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Tour guide not found"
     *             )
     *         )
     *     )
     * )
     */
    public function showUser($tourGuideId)
    {
        $tourGuide = TourGuide::findOrFail($tourGuideId);
        $user = $tourGuide->user;

        return response()->json($user);
    }
}

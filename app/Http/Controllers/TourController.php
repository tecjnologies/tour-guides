<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
// ['title', 'description', 'price'];
/**
 * @OA\Schema(
 *     schema="Tour",
 *     type="object",
 *     title="Tour",
 *     required={"tour_guide_id", "title", "price"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the tour"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Title of the tour"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the tour"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="Price of the tour"
 *     ),
 * )
 */



class TourController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tours",
     *     operationId="getToursList",
     *     tags={"Tours"},
     *     summary="Get list of tours",
     *     description="Returns list of tours",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="price", type="number", format="float")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function index()
    {
        return Tour::all();
    }

    /**
     * @OA\Get(
     *     path="/api/tours/{id}",
     *     operationId="getTour",
     *     tags={"Tours"},
     *     summary="Get a specific tour",
     *     description="Returns a specific tour by its ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number", format="float")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour not found"
     *     )
     * )
     */

    public function show($id)
    {
        return Tour::findOrFail($id);
    }


    public function store(Request $request)
    {
        $tour = Tour::create($request->all());
        return response()->json($tour, 201);
    }


    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $tour->update($request->all());
        return response()->json($tour, 200);
    }



    public function destroy($id)
    {
        Tour::destroy($id);
        return response()->json(null, 204);
    }
}

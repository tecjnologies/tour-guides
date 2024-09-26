<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
/**
     * @OA\Schema(
     *     schema="Complaint",
     *     type="object",
     *     title="Complaint",
     *     required={"tour_booking_id", "content"},
     *     @OA\Property(
     *         property="id",
     *         type="integer",
     *         description="ID of the complaint"
     *     ),
     *     @OA\Property(
     *         property="tour_booking_id",
     *         type="integer",
     *         description="ID of the associated tour booking"
     *     ),
     *     @OA\Property(
     *         property="content",
     *         type="string",
     *         description="Content of the complaint"
     *     )
     * )
     */

class ComplaintController extends Controller
{
    
    public function index()
    {
        return Complaint::all();
    }


    public function show($id)
    {
        return Complaint::findOrFail($id);
    }

    /**
     * @OA\Post(
     *     path="/api/tours",
     *     summary="Create a new tour",
     *     tags={"Tours"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="title", type="string", example="Guided City Tour"),
     *                 @OA\Property(property="description", type="string", example="A comprehensive guided tour of the city."),
     *                 @OA\Property(property="price", type="number", format="float", example=99.99),
     *                 required={"title", "description", "price"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tour created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Guided City Tour"),
     *             @OA\Property(property="description", type="string", example="A comprehensive guided tour of the city."),
     *             @OA\Property(property="price", type="number", format="float", example=99.99),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Validation error.")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $complaint = Complaint::create($request->all());
        return response()->json($complaint, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/tours/{id}",
     *     summary="Update a specific tour",
     *     tags={"Tours"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="title", type="string", example="Updated Tour Title"),
     *                 @OA\Property(property="description", type="string", example="Updated description of the tour."),
     *                 @OA\Property(property="price", type="number", format="float", example=109.99),
     *                 required={"title", "description", "price"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tour updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Updated Tour Title"),
     *             @OA\Property(property="description", type="string", example="Updated description of the tour."),
     *             @OA\Property(property="price", type="number", format="float", example=109.99),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Validation error.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Tour not found.")
     *         )
     *     )
     * )
     */

    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->all());
        return response()->json($complaint, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/tours/{id}",
     *     summary="Delete a specific tour",
     *     tags={"Tours"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Tour deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tour not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Tour not found.")
     *         )
     *     )
     * )
     */

    public function destroy($id)
    {
        Complaint::destroy($id);
        return response()->json(null, 204);
    }
}

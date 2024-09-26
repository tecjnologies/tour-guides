<?php
namespace App\Http\Controllers;

use App\Models\AvailableTiming;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="AvailableTiming",
 *     type="object",
 *     title="Available Timing",
 *     required={"tour_guide_id", "available_from", "available_to"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the available timing"
 *     ),
 *     @OA\Property(
 *         property="tour_guide_id",
 *         type="integer",
 *         description="ID of the tour guide"
 *     ),
 *     @OA\Property(
 *         property="available_from",
 *         type="string",
 *         format="date-time",
 *         description="Start time of availability"
 *     ),
 *     @OA\Property(
 *         property="available_to",
 *         type="string",
 *         format="date-time",
 *         description="End time of availability"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp"
 *     )
 * )
 */


class AvailableTimingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/availabletimings",
     *     operationId="getAvailableTimings",
     *     tags={"AvailableTimings"},
     *     summary="Get list of available timings",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/AvailableTiming"))
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     */

    public function index()
    {
        return AvailableTiming::all();
    }


    /**
     * @OA\Get(
     *     path="/api/availabletimings/{id}",
     *     operationId="getAvailableTimingById",
     *     tags={"AvailableTimings"},
     *     summary="Get available timing by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AvailableTiming")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource Not Found"
     *     )
     * )
     */
    public function show($id)
    {
        return AvailableTiming::findOrFail($id);
    }


    /**
     * @OA\Post(
     *     path="/api/availabletimings",
     *     operationId="createAvailableTiming",
     *     tags={"AvailableTimings"},
     *     summary="Create a new available timing",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AvailableTiming")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Available timing created",
     *         @OA\JsonContent(ref="#/components/schemas/AvailableTiming")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $availableTiming = AvailableTiming::create($request->all());
        return response()->json($availableTiming, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/availabletimings/{id}",
     *     operationId="updateAvailableTiming",
     *     tags={"AvailableTimings"},
     *     summary="Update available timing",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AvailableTiming")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AvailableTiming")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource Not Found"
     *     )
     * )
     */


    public function update(Request $request, $id)
    {
        $availableTiming = AvailableTiming::findOrFail($id);
        $availableTiming->update($request->all());
        return response()->json($availableTiming, 200);
    }


    /**
     * @OA\Delete(
     *     path="/api/availabletimings/{id}",
     *     operationId="deleteAvailableTiming",
     *     tags={"AvailableTimings"},
     *     summary="Delete available timing",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="No Content"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource Not Found"
     *     )
     * )
     */
    public function destroy($id)
    {
        AvailableTiming::destroy($id);
        return response()->json(null, 204);
    }
}

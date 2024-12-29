<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TourGuideController;


Route::post('/test', function () {
    return response()->json(['message' => 'CORS is working!']);
});


Route::prefix('tourguides')->group(function () {
    Route::get('/', [TourGuideController::class, 'index']);
    Route::post('/store', [TourGuideController::class, 'store']);
});
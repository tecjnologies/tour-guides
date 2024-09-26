<?php

// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TourGuideController,
    DocumentController,
    MediaController,
    TourController,
    TourGuideTourController,
    TourBookingController,
    AvailableTimingController,
    SettingController,
    InvoiceController,
    LanguageController,
    MessageController,
    ReviewController,
    ComplaintController,
    NotificationController
};


use App\Http\Controllers\AuthController;



// // Tour Guide Routes
// Route::get('/tour-guides', [TourGuideController::class, 'index']);
// Route::post('/tour-guides', [TourGuideController::class, 'store']);
// Route::get('/tour-guides/{id}', [TourGuideController::class, 'show']);
// Route::put('/tour-guides/{id}', [TourGuideController::class, 'update']);
// Route::delete('/tour-guides/{id}', [TourGuideController::class, 'destroy']);



// Tour Guide Routes
Route::prefix(prefix: 'tourguides')->group(function () {
    Route::get('/', [TourGuideController::class, 'index']);
    Route::get('/{id}', [TourGuideController::class, 'show']);
    Route::post('/', [TourGuideController::class, 'store']);
    Route::put('/{id}', [TourGuideController::class, 'update']);
    Route::delete('/{id}', [TourGuideController::class, 'destroy']);
});

// Document Routes
Route::prefix('documents')->group(function () {
    Route::get('/', [DocumentController::class, 'index']);
    Route::get('/{id}', [DocumentController::class, 'show']);
    Route::post('/', [DocumentController::class, 'store']);
    Route::put('/{id}', [DocumentController::class, 'update']);
    Route::delete('/{id}', [DocumentController::class, 'destroy']);
});

// Media Routes
Route::prefix('media')->group(function () {
    Route::get('/', [MediaController::class, 'index']);
    Route::get('/{id}', [MediaController::class, 'show']);
    Route::post('/', [MediaController::class, 'store']);
    Route::put('/{id}', [MediaController::class, 'update']);
    Route::delete('/{id}', [MediaController::class, 'destroy']);
});

// Tour Routes
Route::prefix('tours')->group(function () {
    Route::get('/', [TourController::class, 'index']);
    Route::get('/{id}', [TourController::class, 'show']);
    Route::post('/', [TourController::class, 'store']);
    Route::put('/{id}', [TourController::class, 'update']);
    Route::delete('/{id}', [TourController::class, 'destroy']);
});

// Tour Guide Tour Routes
Route::prefix('tourguidetours')->group(function () {
    Route::get('/', [TourGuideTourController::class, 'index']);
    Route::get('/{id}', [TourGuideTourController::class, 'show']);
    Route::post('/', [TourGuideTourController::class, 'store']);
    Route::put('/{id}', [TourGuideTourController::class, 'update']);
    Route::delete('/{id}', [TourGuideTourController::class, 'destroy']);
});

// Tour Booking Routes
Route::prefix('tourbookings')->group(function () {
    Route::get('/', [TourBookingController::class, 'index']);
    Route::get('/{id}', [TourBookingController::class, 'show']);
    Route::post('/', [TourBookingController::class, 'store']);
    Route::put('/{id}', [TourBookingController::class, 'update']);
    Route::delete('/{id}', [TourBookingController::class, 'destroy']);
});

// Available Timing Routes
Route::prefix('availabletimings')->group(function () {
    Route::get('/', action: [AvailableTimingController::class, 'index']);
    Route::get('/{id}', [AvailableTimingController::class, 'show']);
    Route::post('/', [AvailableTimingController::class, 'store']);
    Route::put('/{id}', [AvailableTimingController::class, 'update']);
    Route::delete('/{id}', [AvailableTimingController::class, 'destroy']);
});

// Setting Routes
Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'index']);
    Route::get('/{id}', [SettingController::class, 'show']);
    Route::post('/', [SettingController::class, 'store']);
    Route::put('/{id}', [SettingController::class, 'update']);
    Route::delete('/{id}', [SettingController::class, 'destroy']);
});

// Invoice Routes
Route::prefix('invoices')->group(function () {
    Route::get('/', [InvoiceController::class, 'index']);
    Route::get('/{id}', [InvoiceController::class, 'show']);
    Route::post('/', [InvoiceController::class, 'store']);
    Route::put('/{id}', [InvoiceController::class, 'update']);
    Route::delete('/{id}', [InvoiceController::class, 'destroy']);
});

// Language Routes
Route::prefix('languages')->group(function () {
    Route::get('/', [LanguageController::class, 'index']);
    Route::get('/{id}', [LanguageController::class, 'show']);
    Route::post('/', [LanguageController::class, 'store']);
    Route::put('/{id}', [LanguageController::class, 'update']);
    Route::delete('/{id}', [LanguageController::class, 'destroy']);
});

// Message Routes
Route::prefix('messages')->group(function () {
    Route::get('/', [MessageController::class, 'index']);
    Route::get('/{id}', [MessageController::class, 'show']);
    Route::post('/', [MessageController::class, 'store']);
    Route::put('/{id}', [MessageController::class, 'update']);
    Route::delete('/{id}', [MessageController::class, 'destroy']);
});

// Review Routes
Route::prefix('reviews')->group(function () {
    Route::get('/', [ReviewController::class, 'index']);
    Route::get('/{id}', [ReviewController::class, 'show']);
    Route::post('/', [ReviewController::class, 'store']);
    Route::put('/{id}', [ReviewController::class, 'update']);
    Route::delete('/{id}', [ReviewController::class, 'destroy']);
});

// Complaint Routes
Route::prefix('complaints')->group(function () {
    Route::get('/', [ComplaintController::class, 'index']);
    Route::get('/{id}', [ComplaintController::class, 'show']);
    Route::post('/', [ComplaintController::class, 'store']);
    Route::put('/{id}', [ComplaintController::class, 'update']);
    Route::delete('/{id}', [ComplaintController::class, 'destroy']);
});

// Notification Routes
Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'index']);
    Route::get('/{id}', [NotificationController::class, 'show']);
    Route::post('/', [NotificationController::class, 'store']);
    Route::put('/{id}', [NotificationController::class, 'update']);
    Route::delete('/{id}', [NotificationController::class, 'destroy']);
});



// Tour Guide Tour Routes
Route::prefix('tourguidetours')->group(function () {
    Route::get('/', [TourGuideTourController::class, 'index']);
    Route::get('/{id}', [TourGuideTourController::class, 'show']);
    Route::post('/', [TourGuideTourController::class, 'store']);
    Route::put('/{id}', [TourGuideTourController::class, 'update']);
    Route::delete('/{id}', [TourGuideTourController::class, 'destroy']);
});


// Route::apiResource('users', UserController::class);
// Route::apiResource('documents', DocumentController::class);
// Route::apiResource('media', MediaController::class);
// Route::apiResource('tours', TourController::class);
// Route::apiResource('tour-guide-tours', TourGuideTourController::class);
// Route::apiResource('tour-bookings', TourBookingController::class);
// Route::apiResource('available-timings', AvailableTimingController::class);
// Route::apiResource('settings', SettingController::class);
// Route::apiResource('invoices', InvoiceController::class);
// Route::apiResource('languages', LanguageController::class);
// Route::apiResource('messages', MessageController::class);
// Route::apiResource('reviews', ReviewController::class);
// Route::apiResource('complaints', ComplaintController::class);
// Route::apiResource('notifications', NotificationController::class);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('user', [AuthController::class, 'user']);
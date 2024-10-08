<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ 
    HomeController, 
    TourGuideController
};

use App\Http\Controllers\User\{
    DashboardController as UserDashboardController, 
    BookingController as  UserBookingController 
} ;

use App\Http\Controllers\Admin\
{
    DistrictController,
    TypeController,
    PlaceController,
    AboutController,
    GuideController,
    UsersController,
    PackageController,
    BookingController,
    BannerController,
    DashboardController,
    ActivityController
};


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tour-guides-profile', [TourGuideController::class, 'index'])->name('tour-guides-profile');

Route::get('/book-your-guide', function () {
    return view('website.book-your-guide');
})->name('book-your-guide');


// Route::get('/tour-guides-profile', function () {
//     return view('website.tour-guides-profile');
// })->name('tour-guides-profile');


Route::get('/tour-guides-details', function () {
    return view('website.tour-guide-details');
})->name('tour-guides-details');


Route::get('/destination-details', function () {
    return view('website.destination-details');
})->name('destination-details');



Route::get('/destinations', function () {
    return view('website.destinations');
})->name('destinations');

Route::get('/join-us', function () {
    return view('website.join-us');
})->name('join-us');

Route::get('/get-help', function () {
    return view('website.get-help');
})->name('get-help');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/', 'HomeController@index')->name('welcome');
// Route::get('/', action: [HomeController::class, 'index'])->name('welcome');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class , 'about'])->name('about');
Route::get('/search', [HomeController::class,'search'])->name('search');
Route::get('/place/details/{id}', [HomeController::class, 'placeDdetails'])->name('place.details');
Route::get('/package/details/{id}', [HomeController::class, 'packageDetails'])->name('package.details');
Route::get('/place-list', [HomeController::class, 'allPlace'])->name('all.place');
Route::get('/package-list', [HomeController::class, 'allPackage'])->name('all.package');
Route::get('/district/{id}', [HomeController::class, 'districtWisePlace'])->name('district.wise.place');
Route::get('/placetype/{id}', [HomeController::class, 'placetypeWisePlace'])->name('placetype.wise.place');
Route::get('/package/booking/{id}', [HomeController::class, 'packageBooking'])->name('package.booking');
Route::get('/package/booking', [HomeController::class, 'storeBookingRequest'])->name('store.package.booking');


Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');



Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => [
        'auth',
        'verified',
    ]
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile-info', [DashboardController::class, 'showProfile'])->name('profile.show');
    Route::get('profile-info/edit/{id}', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile-info/update', [DashboardController::class, 'updateProfile'])->name('profile.update');

    Route::resource('district', DistrictController::class);
    Route::resource('type', TypeController::class);
    Route::resource('place', PlaceController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('about', AboutController::class);
    Route::resource('guide', GuideController::class);
    Route::resource('users', UsersController::class);
    Route::resource('package', PackageController::class);
    Route::get('list', [UsersController::class, 'adminList'])->name('list');

    Route::get('booking-request/list', [BookingController::class, 'pendingBookingList'])->name('pending.booking');
    Route::post('booking-request/approve/{id}', [BookingController::class, 'bookingApprove'])->name('booking.approve');
    Route::post('booking-request/remove/{id}', [BookingController::class, 'bookingRemoveByAdmin'])->name('booking.remove');
    Route::get('running/packages/', [BookingController::class, 'runningPackage'])->name('package.running');
    Route::post('running/package/complete/{id}', [BookingController::class, 'runningPackageComplete'])->name('package.running.complete');
    Route::get('tour-history/list', [BookingController::class, 'tourHistory'])->name('tour.history');
});

Route::group([
    'as' => 'user.',
    'prefix' => 'user',
    'middleware' => [
        'auth',
        'verified',
    ]
], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile-info', [UserDashboardController::class, 'showProfile'])->name('profile.show');
    Route::get('profile-info/edit/{id}', [UserDashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile-info/update', [UserDashboardController::class, 'updateProfile'])->name('profile.update');

    Route::get('districts', [UserDashboardController::class, 'getDistrict'])->name('district');
    Route::get('placetypes', [UserDashboardController::class, 'getPlaceType'])->name('placetype');
    
    Route::get('places', [UserDashboardController::class, 'getPlaces'])->name('place');
    Route::get('places/{id}', [UserDashboardController::class, 'getPlaceDetails'])->name('place.show');

    Route::get('guides', [UserDashboardController::class, 'getGuides'])->name('guide');
    Route::get('guide/{id}', [UserDashboardController::class, 'getGuideDetails'])->name('guide.show');

    Route::get('packages', [UserDashboardController::class, 'getPackage'])->name('package');
    Route::get('packages/{id}', [UserDashboardController::class, 'getPackageDetails'])->name('package.show');

    Route::get('tour-history/list', [UserBookingController::class, 'tourHistory'])->name('tour.history');
    Route::get('booking-request/list', [UserBookingController::class, 'pendingBookingList'])->name('pending.booking');
    Route::post('booking-request/cancel/{id}', [UserBookingController::class, 'canceLBookingRequest'])->name('booking.cancel');
});



View::composer('layouts.frontend.inc.footer', function($view){
    $placetypes = App\Models\Placetype::all();
    $view->with('placetypes', $placetypes);
});
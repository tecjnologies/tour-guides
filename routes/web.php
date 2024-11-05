<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\{ 
    HomeController, 
    TourGuideController,
    DestinationController,
    PlaceController as WebsitePlaceController
};

use App\Http\Controllers\User\{
    DashboardController as UserDashboardController, 
    BookingController as  UserBookingController 
} ;

use App\Http\Middleware\{
    RoleMiddleware,
    Authenticate
};

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
    ActivityController,
    TourTypeController
};

use Illuminate\Auth\Notifications\VerifyEmail;


Auth::routes(['verify' => true]);

Route::middleware([SetLocale::class])->group(function () {
    Route::get('language/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'ar'])) {
            Session::put('locale', $locale);
        }
        return Redirect::back();
    })->name('language.switch');
});


Route::get('/test-role', function () {
    return 'This is a test route.';
})->middleware(RoleMiddleware::class . ':admin');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/tour-guides-profile', [TourGuideController::class, 'index'])->name('tour-guides-profile');
Route::get('/tour-guides-profile/{id}', [TourGuideController::class, 'show'])->name('show.tourguide');
Route::post('/tour-guides-profile/search', [TourGuideController::class, 'search'])->name('search.tour-guide');
Route::get('/destination-details/{id}', [DestinationController::class, 'show'])->name('show.destination');
Route::delete('/destination-image/{id}', [DestinationController::class, 'destroyImage'])->name('images.destroy');
Route::get('/destinations', function () {  return view('website.destinations'); })->name('destinations');
Route::get('/join-us', function () {  return view('website.join-us');})->name('join-us');
Route::get('/get-help', function () { return view('website.get-help');})->name('get-help');
Route::get('/about-us', [HomeController::class , 'about'])->name('about-us');
Route::get('/favourites', [HomeController::class , 'favourites'])->name('favourites');
Route::get('/search', [HomeController::class,'search'])->name('search');
Route::get('/place/details/{id}', [HomeController::class, 'placeDdetails'])->name('place.details');
Route::get('/package/details/{id}', [HomeController::class, 'packageDetails'])->name('package.details');
Route::get('/place-list', [HomeController::class, 'allPlace'])->name('all.place');
Route::get('/package-list', [HomeController::class, 'allPackage'])->name('all.package');
Route::get('/district/{id}', [HomeController::class, 'districtWisePlace'])->name('district.wise.place');
Route::get('/placetype/{id}', [HomeController::class, 'placetypeWisePlace'])->name('placetype.wise.place');
Route::get('/package/booking/{id}', [HomeController::class, 'packageBooking'])->name('package.booking');
Route::get('/places/{placeTypeId}', [WebsitePlaceController::class, 'getPlacesByType']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/package/booking', [HomeController::class, 'storeBookingRequest'])->name('store.package.booking');
    Route::match(['get', 'post'], '/favorite/{placeId}', [HomeController::class, 'toggleFavorite'])->name('toggle-favourites');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin','middleware' => [ Authenticate::class , 'verified', RoleMiddleware::class . ':admin' ]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile-info', [DashboardController::class, 'showProfile'])->name('profile.show');
    Route::get('profile-info/edit/{id}', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile-info/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::resource('district', DistrictController::class);
    Route::resource('type', TypeController::class);
    Route::resource('tourtype', TourTypeController::class);
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

Route::group(['as' => 'user.','prefix' => 'user','middleware' => [ 'auth','verified', RoleMiddleware::class . ':user']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile-info', [UserDashboardController::class, 'showProfile'])->name('profile.show');
    Route::get('profile-info/edit/{id}', [UserDashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile-info/update', [UserDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('booking-request/list', [UserBookingController::class, 'pendingBookingList'])->name('pending.booking');
    Route::post('booking-request/cancel/{id}', [UserBookingController::class, 'canceLBookingRequest'])->name('booking.cancel');
});

View::composer('layouts.frontend.inc.footer', function($view){
    $placetypes = App\Models\Placetype::all();
    $view->with('placetypes', $placetypes);
});
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourGuideController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('website.home');
})->name('home');

Route::get('/book-your-guide', function () {
    return view('website.book-your-guide');
})->name('book-your-guide');

Route::get('/tour-guides-profile', function () {
    return view('website.tour-guides-profile');
})->name('tour-guides-profile');

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Route::get('login', action: [LoginController::class, 'showLoginForm'])->name(name: 'login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('login', function () {
//     return view('auth.login');
// });

// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

Route::get('/user/{id}/tour-guides', [UserController::class, 'showTourGuides']);
Route::get('/tour-guide/{id}/user', [TourGuideController::class, 'showUser']);
Route::get('/users', [UserController::class, 'index']);



require __DIR__.'/auth.php';

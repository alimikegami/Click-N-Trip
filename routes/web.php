<?php

use App\Http\Controllers\DayTripPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\DayTripPlan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing-page.landing-page');
});

Route::get('/users/login', [UserController::class, 'login'])->name('login');
Route::get('/users/register', [UserController::class, 'register'])->name('register');
Route::post('/users/register', [UserController::class, 'store'])->name('store');
Route::post('/users/login', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/users/day-trips', [UserController:: class, 'dayTripPlanForm'])->name('list-day-trips')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/register/tour-guide', [UserController::class, 'registerAsTourGuide'])->name('register-as-tour-guide')->middleware('auth');
Route::post('/users/register/tour-guide', [UserController::class, 'storeTourGuideDetails'])->name('store-tour-guide')->middleware('auth');
Route::get('/users/history', [UserController::class, 'showHistory'])->middleware('auth');

// Route::get('/day-trips', [DayTripPlanController::class, 'search'])->name('search');
Route::patch('/day-trips/reservation/{resId}', [DayTripPlanController::class, 'updateStatus']);
Route::get('/day-trips/{id}/reservation', [DayTripPlanController::class, 'showReservation']);
Route::get('/day-trips/search', [DayTripPlanController::class, 'search'])->name('search');
Route::post('/day-trips', [DayTripPlanController::class, 'store'])->middleware('auth');
Route::delete('/day-trips/{id}', [DayTripPlanController::class, 'delete']);
Route::get('/day-trips/{day_trip_plan}', [DayTripPlanController::class, 'show']);
Route::post('/day-trips/book', [DayTripPlanController::class, 'book']);

Route::get('/test', function () {
    return view('day-trips.search-result');
});
Route::get('/trip-details', function () {
    return view('day-trips.day-trip-pages');
});
Route::get('/user-trip-listing', function () {
    return view('users.my-day-trip-listing');
});
Route::get('/user-trip-listing-reservation', function () {
    return view('users.my-day-trip-listing-reservation');
});
Route::get('/transac-history', function () {
    return view('users.user-transaction-history');
});
Route::get('/payment-method', function () {
    return view('users.payment-method');
});
Route::get('/payment-details', function () {
    return view('users.payment-details');
});
Route::get('/adminhome', function () {
    return view('users.admin-home');
});
Route::get('/adminuserlist', function () {
    return view('users.admin-user-list');
});
Route::get('/admintourapply', function () {
    return view('users.admin-tour-apply');
});
Route::get('/adminpendingpayment', function () {
    return view('users.admin-pending-payment');
});
Route::get('/adminapprovedpayment', function () {
    return view('users.admin-approved-payment');
});


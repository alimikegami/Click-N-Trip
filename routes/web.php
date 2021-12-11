<?php

use App\Http\Controllers\AdminController;
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
})->name('landingPage');

Route::get('/users/login', [UserController::class, 'login'])->name('login');
Route::post('/users/logout', [UserController::class, 'logout']);
Route::get('/users/register', [UserController::class, 'register'])->name('register');
Route::post('/users/register', [UserController::class, 'store'])->name('store');
Route::post('/users/login', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/users/day-trips', [UserController:: class, 'dayTripPlanForm'])->name('list-day-trips')->middleware('auth');
Route::get('/users/register/tour-guide', [UserController::class, 'registerAsTourGuide'])->name('register-as-tour-guide')->middleware('auth');
Route::post('/users/register/tour-guide', [UserController::class, 'storeTourGuideDetails'])->name('store-tour-guide')->middleware('auth');
Route::get('/users/history', [UserController::class, 'showHistory'])->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show']);

Route::post('/day-trips/book', [DayTripPlanController::class, 'book']);
Route::patch('/day-trips/reservation/proof/{resId}', [DayTripPlanController::class, 'updatePaymentProof']);
Route::patch('/day-trips/reservation/{resId}', [DayTripPlanController::class, 'updateStatus']);
Route::get('/day-trips/{id}/reservation', [DayTripPlanController::class, 'showReservation']);
Route::get('/day-trips/search', [DayTripPlanController::class, 'search'])->name('search');
Route::post('/day-trips', [DayTripPlanController::class, 'store'])->middleware('auth');
Route::delete('/day-trips/{id}', [DayTripPlanController::class, 'delete']);
Route::get('/day-trips/{day_trip_plan}', [DayTripPlanController::class, 'show']);

Route::get('/admins/dashboard', [AdminController::class, 'showDashboard']);
Route::get('/admins/dashboard/tour-guide-applications', [AdminController::class, 'showTourGuideApplications']);
Route::patch('/admins/tour-guide-application/{id}');
Route::get('/admins/dashboard/payment-details', [AdminController::class, 'showPaymentDetails']);
Route::get('/admins/dashboard/transaction-history', [AdminController::class, 'showTransactionHistory']);
Route::get('/admins/dashboard/users', [AdminController::class, 'showUsers']);
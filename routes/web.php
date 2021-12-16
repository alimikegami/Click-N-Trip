<?php

use App\Models\DayTripPlan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DayTripPlanController;

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

Route::middleware(['auth'])->group(function(){
    Route::get('/users/register/tour-guide', [UserController::class, 'registerAsTourGuide'])->name('register-as-tour-guide');
    Route::post('/users/register/tour-guide', [UserController::class, 'storeTourGuideDetails'])->name('store-tour-guide');
    Route::get('/users/history', [UserController::class, 'showHistory']);
    Route::post('/day-trips/{id}/review', [ReviewController::class, 'store']);
    Route::post('/day-trips/book', [DayTripPlanController::class, 'book']);
    Route::patch('/day-trips/reservation/proof/{resId}', [DayTripPlanController::class, 'updatePaymentProof']);
    
});
    
Route::middleware(['auth', 'ensureroles:tour_guide'])->group(function(){
    Route::patch('/day-trips/reservation/{resId}', [DayTripPlanController::class, 'updateStatus']);
    Route::get('/users/day-trips', [UserController::class, 'dayTripPlanForm'])->name('list-day-trips');
    Route::get('/users/day-trips/edit/{id}', [DayTripPlanController::class, 'showEditForm'])->name('list-day-trips-edit');
    Route::post('/day-trips', [DayTripPlanController::class, 'store']);
    Route::get('/users/my-listings', [UserController::class, 'showMyListings']);
    Route::get('/day-trips/{id}/reservation', [DayTripPlanController::class, 'showReservation']);
    Route::put('/day-trips/{id}', [DayTripPlanController::class, 'edit']);
    Route::delete('/day-trips/{id}', [DayTripPlanController::class, 'delete']);
});

Route::middleware(['auth', 'ensureroles:admin'])->group(function(){
    Route::get('/admins/dashboard', [AdminController::class, 'showDashboard']);
    Route::get('/admins/dashboard/tour-guide-applications', [AdminController::class, 'showTourGuideApplications']);
    Route::patch('/admins/tour-guide-application/{id}', [AdminController::class, 'setApplicationResults']);
    Route::patch('/admins/users/block/{id}', [AdminController::class, 'setUserAccess']);
    Route::patch('/admins/reservation/{id}', [AdminController::class, 'setPaymentApproval']);
    Route::get('/admins/dashboard/payment-details', [AdminController::class, 'showPaymentDetails']);
    Route::get('/admins/dashboard/transaction-history', [AdminController::class, 'showTransactionHistory']);
    Route::get('/admins/dashboard/transaction-history/search', [AdminController::class, 'searchTransactionHistory']);
    Route::get('/admins/dashboard/users', [AdminController::class, 'showUsers']);
    Route::get('/admins/users/search', [AdminController::class, 'searchUsers'])->name('search');

});

Route::get('/', [UserController::class, 'landingPage'])->name('landingPage');
Route::get('/users/login', [UserController::class, 'login'])->name('login');
Route::post('/users/logout', [UserController::class, 'logout']);
Route::get('/users/register', [UserController::class, 'register'])->name('register');
Route::post('/users/register', [UserController::class, 'store'])->name('store');
Route::post('/users/login', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/day-trips/search', [DayTripPlanController::class, 'search'])->name('search');
Route::get('/day-trips/{day_trip_plan}', [DayTripPlanController::class, 'show']);
Route::get('/payment-method', [UserController::class, 'showPaymentMethod'])->middleware('auth');
Route::get('/payment-method/{type}', [UserController::class, 'showPaymentDetails'])->middleware('auth');



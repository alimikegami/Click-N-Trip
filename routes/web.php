<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('LandingPage');
});

Route::get('/dummy', function(){
    return view('dummy');
})->name('dummy');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/register-as-tour-guide', [UserController::class, 'registerAsTourGuide'])->name('register-as-tour-guide')->middleware('auth');
Route::post('/store-tour-guide', [UserController::class, 'storeTourGuideDetails'])->name('store-tour-guide')->middleware('auth');
<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\TourGuideStoreRequest;
use App\Models\User;
use App\Models\DayTripPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function show(User $user){
        $userListing = DayTripPlan::getDayTripPlanWithImages();
        return view('users.my-day-trip-listing', [
            'user'=>$user,
            'listings'=>$userListing
        ]);
    }

    public function showListings(Request $request, $id){
        $userListing = DayTripPlan::with(['dayTripImages'])->get();
        dd($userListing);
        return view('users.my-day-trip-listing');
    }

    public function register()
    {
        return view('users.register');
    }

    public function registerAsTourGuide()
    {
        return view('users.register-as-tour-guide');
    }

    public function dayTripPlanForm() {
        return view('users.create-day-trip-plan');
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = new User($validated);
        $user->role = "user";
        $user->save();
        return back()->with('success', 'Registration Completed!');
    }

    public function storeTourGuideDetails(TourGuideStoreRequest $request) {
        $validated = $request->validated();
        $path = $request->file('fotoktp')->store('selfie-ktp');
        $temp = explode('/', $path);    // Getting the attachment name
        $user = User::find(Auth::id());
        $user->nik = $request->nik;
        $user->address = $request->address;
        $user->province = $request->province;
        $user->selfie_with_ktp = $temp[1];
        $user->save();

        return back()->with('success', 'Registration Completed!');
    }

    public function authenticate(AuthenticationRequest $request) {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

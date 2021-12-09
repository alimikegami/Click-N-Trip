<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Models\User;
use App\Models\DayTripPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\TourGuideStoreRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('users.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['status' => 200], 200);
    }

    public function show(User $user)
    {
        $userListing = $this->userService->getAllUserDataById($user->id);
        return view('users.my-day-trip-listing', [
            'user' => $user,
            'userListing' => $userListing
        ]);
    }

    public function showHistory()
    {
        $history = $this->userService->getReservationHistoryByUserId(Auth::id());
        return view('users.user-transaction-history', [
            "history" => $history,
        ]);
    }

    public function register()
    {
        return view('users.register');
    }

    public function registerAsTourGuide()
    {
        return view('users.register-as-tour-guide');
    }

    public function dayTripPlanForm()
    {
        return view('users.create-day-trip-plan');
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $user = $this->userService->store($validated);

        if ($user) {
            return back()->with('success', 'Registration Completed!');
        }
        return back()->with('error', 'Registration Incomplete!');
    }

    public function storeTourGuideDetails(TourGuideStoreRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $user = $this->userService->storeTourGuide($validated, $request->file('fotoktp'));
        if ($user) {
            return back()->with('success', 'Registration Completed!');
        } else {
            return back()->with('error', 'Registration Incomplete!');
        }
    }

    public function authenticate(AuthenticationRequest $request)
    {
        $credentials = $request->validated();
        if ($this->userService->authenticate($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

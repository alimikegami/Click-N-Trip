<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|same:password-confirm|min:8',
        ]);

        $validated['role'] = "user";
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return redirect('users/register')->with('status', 'Anda berhasil Mendaftar');
    }

    public function storeTourGuideDetails(Request $request) {
        $validated = $request->validate([
            'address' => 'required',
            'province' => 'required',
            'nik' => 'required|unique:users,nik|digits:16',
            'fotoktp' => 'required|mimes:jpg,bmp,png|max:5120',
        ]);

        $path = $request->file('fotoktp')->store('selfie-ktp');
        $temp = explode('/', $path);    // Getting the attachment name
        $user = User::find(Auth::id());
        $user->nik = $request->nik;
        $user->address = $request->address;
        $user->province = $request->province;
        $user->selfie_with_ktp = $temp[1];
        $user->save();

        // return redirect()->route('dummy', [$user]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('register-as-tour-guide');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

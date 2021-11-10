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
        return view('LoginPage');
    }

    public function register()
    {
        return view('RegisterPage');
    }

    public function registerAsTourGuide()
    {
        return view('RegisterAsTourGuidePage');
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
        return redirect('/register')->with('status', 'Anda berhasil Mendaftar');
    }

    public function storeTourGuideDetails(Request $request) {
        $validated = $request->validate([
            'address' => 'required',
            'province' => 'required|unique:users,email',
            'nik' => 'required|unique:users,nik|digits:12',
            'fotoktp' => 'required|image|mimes:png,jpeg|max:5120',
        ]);

        
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

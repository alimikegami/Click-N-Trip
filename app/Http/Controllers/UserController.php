<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function authenticate(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}

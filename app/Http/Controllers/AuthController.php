<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function insertUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:24',
            'email' => 'required|email|unique:users',
            'bio' => 'max:255',
            'password' => 'required|between:4,20|confirmed'
        ]);

        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['name'],
            'email' => $validatedData['email'],
            'bio' => $validatedData['bio'],
            'password' => bcrypt($validatedData['password'])
        ]);

        return redirect()->route('register')->with('success', 'Registrasi berhasil');
    }

    public function showLogin()
    {
        return view("auth.login");
    }
}

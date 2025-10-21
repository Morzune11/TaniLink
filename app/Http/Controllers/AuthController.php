<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email|unique:users|min:5|max:40',
            'bio' => 'max:255',
            'password' => 'required|between:4,20|confirmed'
        ]);

        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['name'],
            'email' => $validatedData['email'],
            'bio' => $validatedData['bio'],
            'password' => Hash::make($validatedData['password'])
        ]);

        return redirect()->route('register')->with('success', 'Registrasi berhasil');
    }

    public function showLogin()
    {
        return view("auth.login");
    }

    public function validateUser(Request $request)
    {
        $request->validate([
            'email' => "required|email|min:3|max:40",
            'password' => 'required|between:4,20'
        ]);

        $user = User::where('email', $request['email'])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('home')->with('success', 'Selamat datang di TaniLink');
        }
        dump('after login', [
            'auth_check' => Auth::check(),
            'user' => Auth::user(),
            'userId' => Auth::id(),
            'session_id' => session()->getId(),
        ]);
        return back()->with('error', 'email atau password salah');
    }

    // logout

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('login')->with('message', 'Logout berhasil');
    }
}
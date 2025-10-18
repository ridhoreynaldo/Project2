<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/redirect');
        }
        return redirect('/login')->withErrors(['login' => 'Email atau password salah']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\Mahasiswa\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('/asrama/mahasiswa/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'LOGINUSERNAME' => 'required',
            'LOGINPASSWORD' => 'required',
        ]);

        $user = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('LOGINUSERNAME', $request->LOGINUSERNAME)
            ->first();

        if ($user && $user->LOGINPASSWORD === $request->LOGINPASSWORD) {
            Session::put('mahasiswa', $user);
            return redirect('/asrama/mahasiswa/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Session::forget('mahasiswa');
        return redirect('/asrama/mahasiswa/login');
    }
}

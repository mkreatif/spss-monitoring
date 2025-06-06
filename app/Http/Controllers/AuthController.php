<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function logout()
    {
        // return view('auth.login');
    }

    public function login(Request $request)
    {
        // dd(Auth::getProvider()->retrieveByCredentials(['nik' => '00011']));

        $credentials = $request->only('nik', 'password');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        // dd("Login gagal"); // cek ketika gagal
        return back()->withErrors(['login' => 'NIK atau password salah.']);
    }
}

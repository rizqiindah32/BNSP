<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function showLoginForm()
{
    return view('auth.staff-login'); // Buat file blade ini di resources/views/auth
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (auth()->guard('staff')->attempt($credentials)) {
        return redirect()->route('homepage'); // Pastikan route homepage sudah ada
    }

    return back()->withErrors(['email' => 'Login gagal.']);
}


    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect()->route('staff.login')->with('success', 'Berhasil logout!');
    }

    public function dashboard()
    {
        return view('staff.dashboard');
    }
}

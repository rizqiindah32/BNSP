<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamController extends Controller
{
    public function showLoginForm()
{
    return view('auth.peminjam-login'); // Buat file blade ini di resources/views/auth
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (auth()->guard('peminjam')->attempt($credentials)) {
        return redirect()->route('homepage'); // Pastikan route homepage sudah ada
    }

    return back()->withErrors(['email' => 'Login gagal.']);
}

    public function logout()
    {
        Auth::guard('peminjam')->logout();
        return redirect()->route('peminjam.login')->with('success', 'Berhasil logout!');
    }

    public function dashboard()
    {
        return view('peminjam.dashboard');
    }
}

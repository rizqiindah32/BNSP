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
    // Ambil email dan password dari input
    $credentials = $request->only('email', 'password');

    // Coba login menggunakan guard 'peminjam'
    if (auth()->guard('peminjam')->attempt($credentials)) {
        return redirect()->route('homepage'); // Pastikan route homepage sudah ada
    }

    // Jika login gagal, kembalikan ke halaman login dengan pesan error
    return back()->withErrors(['email' => 'Login gagal.']);
}

    public function logout()
    {
         // Logout dari guard 'peminjam'
        Auth::guard('peminjam')->logout();
        // Redirect kembali ke halaman login dengan pesan sukses
        return redirect()->route('peminjam.login')->with('success', 'Berhasil logout!');
    }

    public function dashboard()
    {
        return view('peminjam.dashboard');// Menampilkan halaman dashboard peminjam
    }
}

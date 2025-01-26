<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');//menampilkan halaman form rehistrasi
    }

    /**
     * Memproses registrasi.
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',//nama harus disii, string dan maksimal 255 karaktre
            'email' => 'required|string|email|max:255|unique:staff,email',//email harus disii
            'password' => 'required|string|min:8|confirmed',//password minimal 8 karakter dan harus dikonfirmasi atau disii
            'role' => 'required|in:staff,peminjam',//role harus disii sesuai rolenya
        ]);

        // Buat user baru
        Staff::create([
            'name' => $request->name,//mengambil nama dari input
            'email' => $request->email,//mengambil email dari input
            'password' => Hash::make($request->password),//password harus disii dan miniamal 8 karakter
            'role' => $request->role,//role harsu diisi sesuai dengan rolenya
        ]);

        //redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}

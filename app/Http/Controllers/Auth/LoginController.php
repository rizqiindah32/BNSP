<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Menampilkan halaman Form login
    }

    public function login(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'email' => 'required|email', //email harus diisi dan memiliki format emailnya
            'password' => 'required', //password harus diisi
            'role' => 'required|in:staff,peminjam', //role harus diisi oleh staff dan juga peminajm
        ]);

        //ambil email dan password dari input untuk login
        $credentials = $request->only('email', 'password');

        // Cek login berdasarkan role
        $user = \App\Models\Staff::where('email', $request->email)
            ->where('role', $request->role)
            ->first();

        //jika pengguna ditemukan dan autentkasi berhasil
        if ($user && Auth::guard('staff')->attempt($credentials)) {
            if ($request->role === 'staff') { //jika role adalah staff diarahkan ke dashboard staff
                return redirect()->route('staff.dashboardstaff'); // Redirect ke dashboard staff
            }

            //jika role adalh peminjam diarahkan ke dashboard peminjam
            if ($request->role === 'peminjam') {
                return redirect()->route('peminjam.dashboardpeminjam'); // Redirect ke dashboard peminjam
            }
        }

        //jika login gagal, kembali kehalaman login dan pesan eror.
        return back()->withErrors(['email' => 'Email atau password salah, atau role tidak sesuai.']);
    }
}


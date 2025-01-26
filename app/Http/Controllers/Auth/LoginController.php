<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Form login
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:staff,peminjam',
        ]);

        $credentials = $request->only('email', 'password');

        // Cek login berdasarkan role
        $user = \App\Models\Staff::where('email', $request->email)
            ->where('role', $request->role)
            ->first();

        if ($user && Auth::guard('staff')->attempt($credentials)) {
            if ($request->role === 'staff') {
                return redirect()->route('staff.dashboardstaff'); // Redirect ke dashboard staff
            }

            if ($request->role === 'peminjam') {
                return redirect()->route('peminjam.dashboardpeminjam'); // Redirect ke dashboard peminjam
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah, atau role tidak sesuai.']);
    }
}


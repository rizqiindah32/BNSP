<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Auth;

Route::resource('penulis', PenulisController::class);
Route::resource('buku', BukuController::class);

Route::resource('registrasi', RegistrasiController::class);

Route::get('/', function () {
    return view('Homepage');
})->name('homepage');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::get('/registrasi/create', [RegistrasiController::class, 'create'])->name('registrasi.create');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::get('/registrasi/{id}/edit', [RegistrasiController::class, 'edit'])->name('registrasi.edit');
Route::put('/registrasi/{id}', [RegistrasiController::class, 'update'])->name('registrasi.update');
Route::delete('/registrasi/{id}', [RegistrasiController::class, 'destroy'])->name('registrasi.destroy');

Route::get('registrasi/{id}/cetak', [RegistrasiController::class, 'cetakPdf'])->name('registrasi.cetak');

// Rute untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::middleware(['auth:staff'])->group(function () {
    Route::get('/staff/dashboardstaff', function () {
        return view('staff/dashboardstaff');
    })->name('staff.dashboardstaff');
});

Route::middleware(['auth:staff'])->group(function () {
    Route::get('/peminjam/dashboardpeminjam', function () {
        return view('peminjam/dashboardpeminjam');
    })->name('peminjam.dashboardpeminjam');
});

// Rute Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

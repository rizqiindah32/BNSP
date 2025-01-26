<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\Agama;
use App\Models\buku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');// Ambil kata kunci pencarian dari input
        $registrasi = Registrasi::with('agama')// Ambil data registrasi beserta relasi agama
            ->when($search, function ($query, $search) {
                $query->where('Nama', 'LIKE', "%{$search}%")// Cari berdasarkan Nama
                    ->orWhere('Email', 'LIKE', "%{$search}%")// Cari berdasarkan Email
                    ->orWhere('nomor_telepon', 'LIKE', "%{$search}%")// Cari berdasarkan Nomor Telepon
                    ->orWhereHas('agama', function ($query) use ($search) {
                        $query->where('nama', 'LIKE', "%{$search}%"); // Cari berdasarkan nama agama
                    });
            })
            ->get();

        return view('registrasi.index', compact('registrasi', 'search')); // Tampilkan data registrasi
    }

    public function create()
    {
        $agama = Agama::all(); // Data agama
        $buku = buku::all(); // Data buku
        return view('registrasi.create', compact('agama', 'buku'));// Tampilkan form registrasi
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:30',
            'Email' => 'required|email|max:30',
            'Tanggal_lahir' => 'required|date',
            'nomor_telepon' => 'required|string|max:11',
            'agama_id' => 'required|exists:agama,id',// Validasi ID agama harus ada di tabel agama
            'buku_id' => 'required|exists:buku,id', // Validasi buku_id
            'alamat' => 'required|string|max:25',
        ]);

        Registrasi::create($request->all()); // Simpan data registrasi

        return redirect()->route('registrasi.index')->with('success', 'Registrasi berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $registrasi = Registrasi::findOrFail($id); // Ambil data berdasarkan ID
        $agama = Agama::all(); // Ambil data agama untuk dropdown
        return view('registrasi.edit', compact('registrasi', 'agama'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required|string|max:30',
            'Email' => 'required|email|max:30',
            'Tanggal_lahir' => 'required|date',
            'nomor_telepon' => 'required|string|max:11',
            'agama_id' => 'required|exists:agama,id',
            'alamat' => 'required|string|max:25',
        ]);

        $registrasi = Registrasi::findOrFail($id);// Cari data registrasi berdasarkan ID
        $registrasi->update($request->all());// Perbarui data registrasi

        return redirect()->route('registrasi.index')->with('success', 'Registrasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete(); // Hapus data registrasi
        return redirect()->route('registrasi.index')->with('success', 'Registrasi berhasil dihapus.');
    }

    public function cetakPdf($id)
    {
        $registrasi = Registrasi::with('agama')->findOrFail($id); // Ambil data registrasi dengan agama
        $pdf = Pdf::loadView('registrasi.pdf', compact('registrasi')); // Load view untuk PDF
        return $pdf->download('registrasi-' . $registrasi->Nama . '.pdf'); // Unduh file PDF
    }
}

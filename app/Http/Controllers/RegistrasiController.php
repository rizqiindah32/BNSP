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
        $search = $request->input('search');
        $registrasi = Registrasi::with('agama')
            ->when($search, function ($query, $search) {
                $query->where('Nama', 'LIKE', "%{$search}%")
                    ->orWhere('Email', 'LIKE', "%{$search}%")
                    ->orWhere('nomor_telepon', 'LIKE', "%{$search}%")
                    ->orWhereHas('agama', function ($query) use ($search) {
                        $query->where('nama', 'LIKE', "%{$search}%");
                    });
            })
            ->get();

        return view('registrasi.index', compact('registrasi', 'search'));
    }

    public function create()
    {
        $agama = Agama::all(); // Data agama
        $buku = buku::all(); // Data buku
        return view('registrasi.create', compact('agama', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:30',
            'Email' => 'required|email|max:30',
            'Tanggal_lahir' => 'required|date',
            'nomor_telepon' => 'required|string|max:11',
            'agama_id' => 'required|exists:agama,id',
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

        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update($request->all());
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

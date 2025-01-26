<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{

    public function index()
    {
        $penulis = Penulis::all(); // Ambil semua data penulis
        return view('penulis.index', compact('penulis'));// Tampilkan halaman index dengan data penulis
    }

    public function create()
    {
        return view('penulis.create'); // Tampilkan halaman form untuk membuat penulis baru
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',// Nama penulis wajib diisi
            'tanggal_lahir' => 'required|date',// Tanggal lahir wajib diisi dengan format tanggal
            'alamat' => 'required', // Pastikan 'alamat' yang divalidasi
        ]);

        // Simpan data penulis ke database
        $penulis = Penulis::create($request->all());

         // Redirect ke halaman daftar penulis dengan pesan sukses
        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $penulis = Penulis::findOrFail($id); // Menampilkan penulis berdasarkan ID
        return view('penulis.show', compact('penulis'));// Tampilkan halaman detail penulis
    }

    public function edit(string $id)
    {
        $penulis = Penulis::findOrFail($id); // Ambil data penulis berdasarkan ID
        return view('penulis.edit', compact('penulis'));// Tampilkan halaman edit penulis
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        $penulis = Penulis::findOrFail($id);// Cari data penulis berdasarkan ID
        $penulis->update($request->all()); // Perbarui data penulis

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete(); // Hapus data penulis

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil dihapus.');
    }
}

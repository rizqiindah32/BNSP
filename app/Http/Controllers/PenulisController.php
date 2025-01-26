<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penulis = Penulis::all(); // Ambil semua data penulis
        return view('penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required', // Pastikan 'alamat' yang divalidasi
        ]);

        // Simpan data penulis ke database
        $penulis = Penulis::create($request->all());

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $penulis = Penulis::findOrFail($id); // Menampilkan penulis berdasarkan ID
        return view('penulis.show', compact('penulis'));
    }

    public function edit(string $id)
    {
        $penulis = Penulis::findOrFail($id); // Ambil data penulis berdasarkan ID
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        $penulis = Penulis::findOrFail($id);
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

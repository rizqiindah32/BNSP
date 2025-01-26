<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('penulis')->get(); // Ambil data buku beserta data penulis
        // exit(json_encode($buku));
        $penulis = Penulis::all(); // Ambil semua penulis untuk dropdown

        return view('buku.index', compact('buku', 'penulis'));//tampilkan halaman daftar buku
    }

    public function store(Request $request)
    {
        //validasi input
    $request->validate([
        'penulis_id' => 'required|exists:penulis,id',// Penulis harus valid dan ada di tabel penulis
        'judul' => 'required|string|max:25',// Judul wajib diisi, maksimal 25 karakter
        'published_at' => 'required|date',// Tanggal terbit wajib diisi dengan format tanggal
    ]);

    Buku::create($request->all()); // Simpan nama penulis langsung ke tabel buku

     // Redirect kembali ke halaman daftar buku dengan pesan sukses
    return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id); // Cari buku berdasarkan ID
        $penulis = Penulis::all(); // Ambil semua penulis untuk dropdown

        return view('buku.edit', compact('buku', 'penulis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penulis_id' => 'required|exists:penulis,id', // Validasi ID penulis
            'judul' => 'required|string|max:25',
            'published_at' => 'required|date',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all()); // Update data buku

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }
public function destroy($id)
{
    $buku = Buku::findOrFail($id); // Ambil satu instance berdasarkan id
    $buku->delete(); // Hapus buku

    // Redirect kembali ke halaman daftar buku dengan pesan sukses
    return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
}

}

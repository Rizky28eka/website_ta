<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    // Tampilkan semua kategori barang
    public function index()
    {
        $kategori = KategoriBarang::orderBy('nama_kategori')->get();
        return view('pages.admin.kategori_barang.index', compact('kategori'));
    }

    // Tampilkan form tambah kategori
    public function create()
    {
        return view('pages.admin.kategori_barang.tambah');
    }

    // Simpan data kategori barang ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        KategoriBarang::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori_barang.index')->with('success', 'Kategori barang berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function edit($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        return view('pages.admin.kategori_barang.edit', compact('kategori'));
    }

    // Update data kategori barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori = KategoriBarang::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori_barang.index')->with('success', 'Kategori barang berhasil diperbarui.');
    }

    // Hapus data kategori barang
    public function destroy($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori_barang.index')->with('success', 'Kategori barang berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    // Tampilkan semua kategori barang
    public function index()
    {
        $satuan = SatuanBarang::orderBy('nama_satuan')->get();
        return view('pages.admin.satuan_barang.index', compact('satuan'));
    }

    // Tampilkan form tambah kategori
    public function create()
    {
        return view('pages.admin.satuan_barang.tambah');
    }

    // Simpan data kategori barang ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required|string|max:100',
        ]);

        SatuanBarang::create([
            'nama_satuan' => $request->nama_satuan,
        ]);

        return redirect()->route('satuan_barang.index')->with('success', 'Satuan barang berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function edit($id)
    {
        $satuan = SatuanBarang::findOrFail($id);
        return view('pages.admin.satuan_barang.edit', compact('satuan'));
    }

    // Update data kategori barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_satuan' => 'required|string|max:100',
        ]);

        $satuan = SatuanBarang::findOrFail($id);
        $satuan->update([
            'nama_satuan' => $request->nama_satuan,
        ]);

        return redirect()->route('satuan_barang.index')->with('success', 'Satuan barang berhasil diperbarui.');
    }

    // Hapus data kategori barang
    public function destroy($id)
    {
        $satuan = SatuanBarang::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan_barang.index')->with('success', 'Satuan barang berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KondisiBarang;
use Illuminate\Http\Request;

class KondisiBarangController extends Controller
{
    // Tampilkan semua kategori barang
    public function index()
    {
        $kondisi = KondisiBarang::orderBy('nama_kondisi')->get();
        return view('pages.admin.kondisi_barang.index', compact('kondisi'));
    }

    // Tampilkan form tambah kategori
    public function create()
    {
        return view('pages.admin.kondisi_barang.tambah');
    }

    // Simpan data kategori barang ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kondisi' => 'required|string|max:100',
        ]);

        KondisiBarang::create([
            'nama_kondisi' => $request->nama_kondisi,
        ]);

        return redirect()->route('kondisi_barang.index')->with('success', 'Kondisi barang berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function edit($id)
    {
        $kondisi = KondisiBarang::findOrFail($id);
        return view('pages.admin.kondisi_barang.edit', compact('kondisi'));
    }

    // Update data kategori barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kondisi' => 'required|string|max:100',
        ]);

        $kondisi = KondisiBarang::findOrFail($id);
        $kondisi->update([
            'nama_kondisi' => $request->nama_kondisi,
        ]);

        return redirect()->route('kondisi_barang.index')->with('success', 'Kondisi barang berhasil diperbarui.');
    }

    // Hapus data kategori barang
    public function destroy($id)
    {
        $kondisi = KondisiBarang::findOrFail($id);
        $kondisi->delete();

        return redirect()->route('kondisi_barang.index')->with('success', 'Kondisi barang berhasil dihapus.');
    }
}

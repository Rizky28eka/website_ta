<?php

// app/Http/Controllers/StokOpnameController.php
namespace App\Http\Controllers;

use App\Models\StokOpname;
use Illuminate\Http\Request;

class StokOpnameController extends Controller
{
    public function index()
    {
        $stokOpnames = StokOpname::with(['barangMasuk', 'barangKeluar'])->get();

        return view('pages.admin.stokopname.index', compact('stokOpnames'));
    }

    public function create()
    {
        return view('pages.admin.stokopname.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga_satuan' => 'required|numeric|min:0',
            'stok_awal' => 'required|integer|min:0',
            'pptk' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $validated['sisa_stok'] = $validated['stok_awal'];
        $validated['total_nilai_sisa'] = $validated['stok_awal'] * $validated['harga_satuan'];

        StokOpname::create($validated);

        return redirect()->route('stokopname.index')->with('success', 'Data stok opname berhasil ditambahkan');
    }

    public function edit(StokOpname $stokopname)
    {
        return view('pages.admin.stokopname.edit', compact('stokopname'));
    }

    public function update(Request $request, StokOpname $stokopname)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga_satuan' => 'required|numeric|min:0',
            'stok_awal' => 'required|integer|min:0',
            'pptk' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $stokopname->update($validated);
        $stokopname->hitungSisaStok();

        return redirect()->route('stokopname.index')->with('success', 'Data stok opname berhasil diperbarui');
    }

    public function destroy(StokOpname $stokopname)
    {
        $stokopname->delete();

        return redirect()->route('stokopname.index')->with('success', 'Data stok opname berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\StokOpname;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('stokopname')->latest()->get();
        return view('pages.admin.barangkeluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $stokopname = StokOpname::all();
        return view('pages.admin.barangkeluar.tambah', compact('stokopname'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stokopname_id' => 'required|exists:stok_opnames,id',
            'jumlah'        => 'required|integer|min:1',
            'harga_satuan'  => 'required|numeric|min:0',
        ]);

        // ✅ Hitung total di backend
        $total = $request->jumlah * $request->harga_satuan;

        BarangKeluar::create([
            'stokopname_id' => $request->stokopname_id,
            'jumlah'        => $request->jumlah,
            'harga_satuan'  => $request->harga_satuan,
            'total'         => $total,
        ]);

        return redirect()->route('barangkeluar.index')
            ->with('success', 'Data barang keluar berhasil ditambahkan.');
    }

    public function edit(BarangKeluar $barangkeluar)
    {
        $stokopname = StokOpname::all();
        return view('pages.admin.barangkeluar.edit', compact('barangkeluar', 'stokopname'));
    }

    public function update(Request $request, BarangKeluar $barangkeluar)
    {
        $request->validate([
            'stokopname_id' => 'required|exists:stok_opnames,id',
            'jumlah'        => 'required|integer|min:1',
            'harga_satuan'  => 'required|numeric|min:0',
        ]);

        // ✅ Hitung ulang total di backend
        $total = $request->jumlah * $request->harga_satuan;

        $barangkeluar->update([
            'stokopname_id' => $request->stokopname_id,
            'jumlah'        => $request->jumlah,
            'harga_satuan'  => $request->harga_satuan,
            'total'         => $total,
        ]);

        return redirect()->route('barangkeluar.index')
            ->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy(BarangKeluar $barangkeluar)
    {
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index')
            ->with('success', 'Data barang keluar berhasil dihapus.');
    }
}

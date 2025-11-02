<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\StokOpname;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with('stokopname')->latest()->get();
        return view('pages.admin.barangmasuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $stokopname = StokOpname::all();
        return view('pages.admin.barangmasuk.tambah', compact('stokopname'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stokopname_id' => 'required|exists:stok_opnames,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        // ✅ Hitung total di backend
        $total = $request->jumlah * $request->harga_satuan;

        BarangMasuk::create([
            'stokopname_id' => $request->stokopname_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $total,
        ]);

        return redirect()->route('barangmasuk.index')
            ->with('success', 'Data barang masuk berhasil ditambahkan.');
    }

    public function edit(BarangMasuk $barangmasuk)
    {
        $stokopname = StokOpname::all();
        return view('pages.admin.barangmasuk.edit', compact('barangmasuk', 'stokopname'));
    }

    public function update(Request $request, BarangMasuk $barangmasuk)
    {
        $request->validate([
            'stokopname_id' => 'required|exists:stok_opnames,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        // ✅ Hitung ulang total di backend
        $total = $request->jumlah * $request->harga_satuan;

        $barangmasuk->update([
            'stokopname_id' => $request->stokopname_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $total,
        ]);

        return redirect()->route('barangmasuk.index')
            ->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    public function destroy(BarangMasuk $barangmasuk)
    {
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index')
            ->with('success', 'Data barang masuk berhasil dihapus.');
    }
}

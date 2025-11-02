<?php

namespace App\Http\Controllers;

use App\Models\Iventaris;
use App\Models\Barang;
use App\Models\SatuanBarang;
use App\Models\KondisiBarang;
use Illuminate\Http\Request;

class IventarisController extends Controller
{
    public function index()
    {
        $inventaris = Iventaris::with(['barang', 'satuan', 'kondisi'])->orderByDesc('created_at')->get();
        return view('pages.admin.iventaris.index', compact('inventaris'));
    }

    public function create()
    {
        $barang = Barang::all();
        $satuan = SatuanBarang::all();
        $kondisi = KondisiBarang::all();
        return view('pages.admin.iventaris.tambah', compact('barang', 'satuan', 'kondisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'register' => 'nullable|string|max:50',
            'merk_type' => 'nullable|string',
            'jenis_sertifikat' => 'nullable|string|max:50',  // ✅ Tambahan
            'no_sertifikat' => 'nullable|string',            // ✅ Tambahan
            'bahan' => 'nullable|string|max:50',
            'asal_perolehan' => 'nullable|string|max:100',
            'tahun_perolehan' => 'nullable|digits:4|integer',
            'ukuran' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'satuan_barang_id' => 'nullable|exists:satuan_barang,id',
            'kondisi_barang_id' => 'nullable|exists:kondisi_barang,id',
            'harga' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Iventaris::create($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $inventaris = Iventaris::findOrFail($id);
        $barang = Barang::all();
        $satuan = SatuanBarang::all();
        $kondisi = KondisiBarang::all();
        return view('pages.admin.iventaris.edit', compact('inventaris', 'barang', 'satuan', 'kondisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'register' => 'nullable|string|max:50',
            'merk_type' => 'nullable|string',
            'jenis_sertifikat' => 'nullable|string|max:50',  // ✅ Tambahan
            'no_sertifikat' => 'nullable|string',            // ✅ Tambahan
            'bahan' => 'nullable|string|max:50',
            'asal_perolehan' => 'nullable|string|max:100',
            'tahun_perolehan' => 'nullable|digits:4|integer',
            'ukuran' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'satuan_barang_id' => 'nullable|exists:satuan_barang,id',
            'kondisi_barang_id' => 'nullable|exists:kondisi_barang,id',
            'harga' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $inventaris = Iventaris::findOrFail($id);
        $inventaris->update($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $inventaris = Iventaris::findOrFail($id);
        $inventaris->delete();

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil dihapus.');
    }
}

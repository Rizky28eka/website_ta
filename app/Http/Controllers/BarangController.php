<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return view('pages.admin.barang.index', compact('barang'));
    }

    public function create()
    {
        $kategori = KategoriBarang::all();
        return view('pages.admin.barang.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barang,kode_barang',
            'nama_barang' => 'required|string|max:150',
            'kategori_id' => 'nullable|exists:kategori_barang,id',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = KategoriBarang::all();
        return view('pages.admin.barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barang,kode_barang,' . $id,
            'nama_barang' => 'required|string|max:150',
            'kategori_id' => 'nullable|exists:kategori_barang,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}

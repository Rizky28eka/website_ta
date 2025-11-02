<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Tampilkan daftar petugas dengan role operator.
     */
    public function index()
    {
       $petugas = User::all();
        return view('pages.admin.petugas.petugas', compact('petugas'));
    }

    /**
     * Tampilkan form tambah petugas.
     */
    public function create()
    {
        return view('pages.admin.petugas.tambah');
    }

    /**
     * Simpan data petugas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'name'     => 'required|string|max:200',
            'email'    => 'required|email|unique:users',
            'telepon'  => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:admin,operator',
        ]);

        User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'telepon'  => $request->telepon,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit data petugas.
     */
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('pages.admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update data petugas termasuk role.
     */
    public function update(Request $request, $id)
    {
        $petugas = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|unique:users,username,' . $petugas->id,
            'name'     => 'required|string|max:200',
            'email'    => 'required|email|unique:users,email,' . $petugas->id,
            'telepon'  => 'nullable|string|max:20',
            'role'     => 'required|in:admin,operator',
        ]);

        $petugas->update([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'telepon'  => $request->telepon,
            'role'     => $request->role,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    /**
     * Hapus data petugas.
     */
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}

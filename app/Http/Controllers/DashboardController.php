<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Iventaris;
use App\Models\StokOpname;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalUser       = User::count();
        $totalPetugas    = User::where('role', 'operator')->count();
        $totalBarang     = Barang::count();
        $totalInventaris = Iventaris::count();
        $totalStokOpname = StokOpname::count();

        // Hitung total barang masuk & keluar
        $totalBarangMasuk = StokOpname::with('barangMasuk')->get()
            ->sum(fn ($opname) => $opname->barangMasuk->sum('jumlah'));

        $totalBarangKeluar = StokOpname::with('barangKeluar')->get()
            ->sum(fn ($opname) => $opname->barangKeluar->sum('jumlah'));

        // Data Inventaris Terbaru (eager loading)
        $latestInventaris = Iventaris::with(['barang', 'satuan', 'kondisi'])
            ->latest()
            ->take(5)
            ->get();

        // Data Stok Opname Terbaru (barangMasuk & barangKeluar saja)
        $latestStokOpname = StokOpname::with(['barangMasuk', 'barangKeluar'])
            ->latest()
            ->take(5)
            ->get();

        return view('pages.admin.dashboard', compact(
            'totalUser',
            'totalPetugas',
            'totalBarang',
            'totalInventaris',
            'totalStokOpname',
            'totalBarangMasuk',
            'totalBarangKeluar',
            'latestInventaris',
            'latestStokOpname'
        ));
    }
}

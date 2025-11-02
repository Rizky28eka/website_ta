<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iventaris;
use App\Models\StokOpname;
use PDF;

class LaporanController extends Controller
{
    // ============================ //
    // LAPORAN INVENTARIS           //
    // ============================ //

    public function showInventaris()
    {
        $inventaris = Iventaris::with(['barang', 'satuan', 'kondisi'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('pages.admin.laporan.laporan_inventaris', compact('inventaris'));
    }

    public function exportInventarisPDF()
    {
        $inventaris = Iventaris::with(['barang', 'satuan', 'kondisi'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        $pdf = PDF::loadView('pages.admin.laporan.pdf.pdf_inventaris', compact('inventaris'))
                  ->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-inventaris.pdf');
    }

    // ============================ //
    // LAPORAN STOK OPNAME          //
    // ============================ //

    public function showStokOpname()
    {
        $stokopname = StokOpname::with(['barangMasuk', 'barangKeluar'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('pages.admin.laporan.laporan_stokopname', compact('stokopname'));
    }

    public function exportStokOpnamePDF()
    {
        $stokopname = StokOpname::with(['barangMasuk', 'barangKeluar'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        $pdf = PDF::loadView('pages.admin.laporan.pdf.pdf_stokopname', compact('stokopname'))
                  ->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-stokopname.pdf');
    }
}

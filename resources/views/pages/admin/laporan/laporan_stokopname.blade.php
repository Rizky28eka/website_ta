@extends('layouts.admin.index')

@section('title', 'Laporan Stok Opname')

@section('content')
<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Laporan Stok Opname</h4>
        <a href="{{ route('laporan.stokopname.pdf') }}"
           class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            📄 Export PDF
        </a>
    </div>

    <div class="p-6 overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Kode Barang</th>
                    <th class="border p-2">Nama Barang</th>
                    <th class="border p-2">Satuan</th>
                    <th class="border p-2">Harga Satuan</th>
                    <th class="border p-2">Stok Awal</th>
                    <th class="border p-2">Barang Masuk</th>
                    <th class="border p-2">Barang Keluar</th>
                    <th class="border p-2">Sisa Stok</th>
                    <th class="border p-2">Total Harga</th>
                    <th class="border p-2">PPTK</th>
                    <th class="border p-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stokopname as $key => $item)
                    <tr>
                        <td class="border p-2 text-center">{{ $key+1 }}</td>
                        <td class="border p-2">{{ $item->kode_barang }}</td>
                        <td class="border p-2">{{ $item->nama_barang }}</td>
                        <td class="border p-2">{{ $item->satuan }}</td>
                        <td class="border p-2 text-right">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="border p-2 text-right">{{ number_format($item->stok_awal) }}</td>
                        <td class="border p-2 text-right">{{ number_format($item->barangmasuk->sum('jumlah')) }}</td>
                        <td class="border p-2 text-right">{{ number_format($item->barangkeluar->sum('jumlah')) }}</td>
                        <td class="border p-2 text-right">
                            {{ number_format($item->stok_awal + $item->barangmasuk->sum('jumlah') - $item->barangkeluar->sum('jumlah')) }}
                        </td>
                        <td class="border p-2 text-right">
                            Rp {{ number_format(
                                ($item->stok_awal + $item->barangmasuk->sum('jumlah') - $item->barangkeluar->sum('jumlah')) 
                                * $item->harga_satuan, 0, ',', '.'
                            ) }}
                        </td>
                        <td class="border p-2">{{ $item->pptk }}</td>
                        <td class="border p-2">{{ $item->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="border p-4 text-center text-gray-500">Belum ada data stok opname</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

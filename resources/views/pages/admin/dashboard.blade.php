@extends('layouts.admin.index')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 m-4">
    <div class="bg-blue-100 p-4 rounded shadow text-center">
        <h5 class="font-semibold mb-2">Total Barang Masuk</h5>
        <p class="text-3xl font-bold text-blue-700">{{ number_format($totalBarangMasuk) }}</p>
    </div>
    <div class="bg-green-100 p-4 rounded shadow text-center">
        <h5 class="font-semibold mb-2">Total Barang Keluar</h5>
        <p class="text-3xl font-bold text-green-700">{{ number_format($totalBarangKeluar) }}</p>
    </div>
    <div class="bg-yellow-100 p-4 rounded shadow text-center">
        <h5 class="font-semibold mb-2">Total Petugas</h5>
        <p class="text-3xl font-bold text-yellow-700">{{ number_format($totalPetugas) }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 m-4">
    <!-- Inventaris Terbaru -->
    <div class="bg-white p-4 rounded shadow">
        <h4 class="font-semibold mb-4">Data Inventaris Terbaru</h4>
        <div class="overflow-auto">
          <table class="min-w-full text-sm border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-3 py-2">No</th>
            <th class="border px-3 py-2">Kode Barang</th>
            <th class="border px-3 py-2">Nama Barang</th>
            <th class="border px-3 py-2">Register</th>
            <th class="border px-3 py-2">Merk / Type</th>
            <th class="border px-3 py-2">Jenis Sertifikat</th>
            <th class="border px-3 py-2">No Sertifikat</th>
            <th class="border px-3 py-2">Bahan</th>
            <th class="border px-3 py-2">Asal Perolehan</th>
            <th class="border px-3 py-2">Tahun Perolehan</th>
            <th class="border px-3 py-2">Ukuran</th>
            <th class="border px-3 py-2">Jumlah</th>
            <th class="border px-3 py-2">Satuan</th>
            <th class="border px-3 py-2">Kondisi</th>
            <th class="border px-3 py-2">Harga</th>
            <th class="border px-3 py-2">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($latestInventaris as $item)
            <tr>
                <td class="border px-3 py-2 text-center">{{ $loop->iteration }}</td>
                <td class="border px-3 py-2">{{ $item->barang->kode_barang ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->barang->nama_barang ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->register ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->merk_type ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->jenis_sertifikat ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->no_sertifikat ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->bahan ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->asal_perolehan ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->tahun_perolehan ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->ukuran ?? '-' }}</td>
                <td class="border px-3 py-2 text-center">{{ $item->jumlah ?? 0 }}</td>
                <td class="border px-3 py-2">{{ $item->satuan->nama_satuan ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->kondisi->nama_kondisi ?? '-' }}</td>
                <td class="border px-3 py-2">{{ number_format($item->harga, 2, ',', '.') ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $item->keterangan ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="16" class="text-center text-gray-500 py-2">
                    Tidak ada data inventaris terbaru.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>

    <!-- Stok Opname Terbaru -->
    <div class="bg-white p-4 rounded shadow">
        <h4 class="font-semibold mb-4">Data Stok Opname Terbaru</h4>
        <div class="overflow-auto">
            <table class="min-w-full text-sm border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Tanggal</th>
                        <th class="border px-3 py-2">Masuk</th>
                        <th class="border px-3 py-2">Keluar</th>
                        <th class="border px-3 py-2">Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestStokOpname as $item)
                        <tr class="text-center">
                            <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-3 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-3 py-2">{{ $item->barangMasuk->sum('jumlah') }}</td>
                            <td class="border px-3 py-2">{{ $item->barangKeluar->sum('jumlah') }}</td>
                            <td class="border px-3 py-2">{{ $item->sisa_stok }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-2">
                                Tidak ada data stok opname terbaru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

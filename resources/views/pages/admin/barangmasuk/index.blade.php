@extends('layouts.admin.index')

@section('title', 'Data Barang Masuk')

@section('content')
<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Data Barang Masuk</h4>
        <a href="{{ route('barangmasuk.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Tambah Data
        </a>
    </div>

    <div class="p-6 overflow-x-auto">
        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Kode Barang</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Barang</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Harga Satuan</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Jumlah</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Total</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($barangMasuk as $index => $bm)
                    <tr>
                        <td class="px-4 py-2 text-sm">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-sm">{{ $bm->stokopname->kode_barang }}</td>
                        <td class="px-4 py-2 text-sm">{{ $bm->stokopname->nama_barang }}</td>
                        <td class="px-4 py-2 text-sm">Rp {{ number_format($bm->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-sm">{{ $bm->jumlah }}</td>
                        <td class="px-4 py-2 text-sm">Rp {{ number_format($bm->total, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-sm">
                            <a href="{{ route('barangmasuk.edit', $bm->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('barangmasuk.destroy', $bm->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center text-gray-500">Tidak ada data barang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

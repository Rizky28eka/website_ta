@extends('layouts.admin.index')

@section('title', 'Data Stok Opname')

@section('content')
<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Data Stok Opname</h4>
        <a href="{{ route('stokopname.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Tambah Data
        </a>
    </div>

    <div class="p-6 overflow-x-auto">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

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
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stokOpnames as $key => $item)
                    <tr>
                        <td class="border p-2 text-center">{{ $key+1 }}</td>
                        <td class="border p-2">{{ $item->kode_barang }}</td>
                        <td class="border p-2">{{ $item->nama_barang }}</td>
                        <td class="border p-2">{{ $item->satuan }}</td>
                        <td class="border p-2 text-right">Rp {{ number_format($item->harga_satuan,0,',','.') }}</td>
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

                        <td class="border p-2 text-center">
                            <a href="{{ route('stokopname.edit', $item->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('stokopname.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14" class="border p-4 text-center text-gray-500">Belum ada data stok opname</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

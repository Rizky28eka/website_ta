@extends('layouts.admin.index')

@section('title', 'Data Barang')

@section('content')
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Daftar Barang</h4>
            <a href="{{ route('barang.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                + Tambah Barang
            </a>
        </div>

        <div class="p-6 overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Kode Barang</th>
                        <th class="border px-4 py-2">Nama Barang</th>
                        <th class="border px-4 py-2">Kategori</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $item)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->kode_barang }}</td>
                            <td class="border px-4 py-2">{{ $item->nama_barang }}</td>
                            <td class="border px-4 py-2">
                                {{ $item->kategori->nama_kategori ?? '-' }}
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('barang.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

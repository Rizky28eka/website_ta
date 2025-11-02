@extends('layouts.admin.index')

@section('title', 'Data Kondisi Barang')

@section('content')
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Daftar Kondisi Barang</h4>
            <a href="{{ route('kondisi_barang.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                + Tambah Kondisi
            </a>
        </div>

        <div class="p-6 overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Kondisi Barang</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kondisi as $kondisis)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $kondisis->nama_kondisi }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('kondisi_barang.edit', $kondisis->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('kondisi_barang.destroy', $kondisis->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border px-4 py-2 text-center">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

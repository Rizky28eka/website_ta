@extends('layouts.admin.index')

@section('title', 'Data Petugas')

@section('content')

<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Daftar Petugas</h4>
        <a href="{{ route('petugas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah</a>
    </div>

    <div class="p-6 overflow-auto">
        <table class="table-auto w-full text-sm border">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Username</th>
                    <th class="px-4 py-2 border">Telepon</th>
                    <th class="px-4 py-2 border">Role</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($petugas as $item)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $item->name }}</td>
                        <td class="px-4 py-2 border">{{ $item->email }}</td>
                        <td class="px-4 py-2 border">{{ $item->username }}</td>
                        <td class="px-4 py-2 border">{{ $item->telepon }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $item->role }}</td>
                        <td class="px-4 py-2 border text-center space-y-1">
    <a href="{{ route('petugas.edit', $item->id) }}"
       class="inline-flex items-center gap-1 text-yellow-600 hover:text-yellow-800 hover:underline">
        <!-- Ikon edit (pensil) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-10 0l9-9m0 0l-2.5 2.5M14 5l5 5"/>
        </svg>
        Edit
    </a>
    <form action="{{ route('petugas.destroy', $item->id) }}" method="POST"
          class="inline-block"
          onsubmit="return confirm('Yakin ingin menghapus petugas ini?');">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 hover:underline">
            <!-- Ikon hapus (tempat sampah) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v1H9V4a1 1 0 011-1z"/>
            </svg>
            Hapus
        </button>
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center text-gray-500">Belum ada data petugas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@extends('layouts.admin.index')

@section('title', 'Tambah Kondisi Barang')

@section('content')
    <form action="{{ route('kondisi_barang.store') }}" method="POST">
        @csrf
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="list-disc pl-5 text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-header">
                <h4 class="card-title">Tambah Kondisi Barang</h4>
            </div>

            <div class="p-6">
                <div class="grid lg:grid-cols-1 gap-6">

                    <!-- Nama Kategori -->
                    <div>
                        <label for="nama_kondisi" class="text-sm font-medium text-gray-800 mb-2 block">Kondisi Barang</label>
                        <input type="text" id="nama_kondisi" name="nama_kondisi" class="form-input w-full"
                            placeholder="Contoh: Baru, Bekas, Rusak" required>
                    </div>

                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Simpan Data
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

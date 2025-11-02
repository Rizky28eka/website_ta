@extends('layouts.admin.index')

@section('title', 'Edit Kategori Barang')

@section('content')
    <form action="{{ route('kategori_barang.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                <h4 class="card-title">Edit Kategori Barang</h4>
            </div>

            <div class="p-6">
                <div class="grid lg:grid-cols-1 gap-6">

                    <!-- Nama Kategori -->
                    <div>
                        <label for="nama_kategori" class="text-sm font-medium text-gray-800 mb-2 block">Nama Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-input w-full"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                    </div>

                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Update Data
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

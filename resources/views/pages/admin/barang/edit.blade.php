@extends('layouts.admin.index')

@section('title', 'Edit Data Barang')

@section('content')
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
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
                <h4 class="card-title">Edit Data Barang</h4>
            </div>

            <div class="p-6">
                <div class="grid lg:grid-cols-1 gap-6">

                    <!-- Kode Barang -->
                    <div>
                        <label for="kode_barang" class="text-sm font-medium text-gray-800 mb-2 block">Kode Barang</label>
                        <input type="text" id="kode_barang" name="kode_barang" class="form-input w-full"
                            value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                    </div>

                    <!-- Nama Barang -->
                    <div>
                        <label for="nama_barang" class="text-sm font-medium text-gray-800 mb-2 block">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-input w-full"
                            value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori_id" class="text-sm font-medium text-gray-800 mb-2 block">Kategori Barang</label>
                        <select name="kategori_id" id="kategori_id" class="form-select w-full" required>
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kategori_id', $barang->kategori_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
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

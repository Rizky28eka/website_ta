@extends('layouts.admin.index')

@section('title', 'Edit Data Inventaris')

@section('content')
    <form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST">
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
                <h4 class="card-title">Edit Data Inventaris</h4>
            </div>

            <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label>Barang</label>
                    <select name="barang_id" class="form-select w-full" required>
                        @foreach($barang as $b)
                            <option value="{{ $b->id }}" {{ $inventaris->barang_id == $b->id ? 'selected' : '' }}>
                                {{ $b->kode_barang }} - {{ $b->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Register</label>
                    <input type="text" name="register" class="form-input w-full" value="{{ $inventaris->register }}">
                </div>
                <div>
                    <label>Merk / Type</label>
                    <input type="text" name="merk_type" class="form-input w-full" value="{{ $inventaris->merk_type }}">
                </div>
                <div>
                    <label>No Sertifikat</label>
                    <input type="text" name="no_sertifikat" class="form-input w-full" value="{{ $inventaris->no_sertifikat }}">
                </div>
                <div>
                    <label>Bahan</label>
                    <input type="text" name="bahan" class="form-input w-full" value="{{ $inventaris->bahan }}">
                </div>
                <div>
                    <label>Asal Perolehan</label>
                    <input type="text" name="asal_perolehan" class="form-input w-full" value="{{ $inventaris->asal_perolehan }}">
                </div>
                <div>
                    <label>Tahun Perolehan</label>
                    <input type="number" name="tahun_perolehan" class="form-input w-full" min="1900" max="2099" value="{{ $inventaris->tahun_perolehan }}">
                </div>
                <div>
                    <label>Ukuran</label>
                    <input type="text" name="ukuran" class="form-input w-full" value="{{ $inventaris->ukuran }}">
                </div>
                <div>
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-input w-full" min="1" value="{{ $inventaris->jumlah }}">
                </div>
                <div>
                    <label>Satuan</label>
                    <select name="satuan_barang_id" class="form-select w-full" required>
                        @foreach($satuan as $s)
                            <option value="{{ $s->id }}" {{ $inventaris->satuan_id == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_satuan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Kondisi</label>
                    <select name="kondisi_barang_id" class="form-select w-full" required>
                        @foreach($kondisi as $k)
                            <option value="{{ $k->id }}" {{ $inventaris->kondisi_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kondisi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Harga (Rp)</label>
                    <input type="number" step="0.01" name="harga" class="form-input w-full" value="{{ $inventaris->harga }}">
                </div>
                <div class="lg:col-span-2">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-input w-full">{{ $inventaris->keterangan }}</textarea>
                </div>
            </div>

            <div class="mt-6 px-6">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Update Data
                </button>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.admin.index')

@section('title', 'Tambah Data Inventaris')

@section('content')
    <form action="{{ route('inventaris.store') }}" method="POST">
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
                <h4 class="card-title">Tambah Data Inventaris</h4>
            </div>

            <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="lg:col-span-2">
                    <label>Kode Barang</label>
                    <select name="barang_id" class="form-select w-full" required>
                        <option value="">Pilih Barang</option>
                        @foreach($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->kode_barang }} - {{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Register</label>
                    <input type="text" name="register" class="form-input w-full" required>
                </div>
                <div>
                    <label>Merk / Type</label>
                    <input type="text" name="merk_type" class="form-input w-full">
                </div>
             <div>
    <label>Jenis Nomor</label>
    <select name="jenis_sertifikat" class="form-select w-full" required>
        <option value="">Pilih Jenis Nomor</option>
        <option value="No. Sertifikat">No. Sertifikat</option>
        <option value="No. Pabrik">No. Pabrik</option>
        <option value="No. Chasis">No. Chasis</option>
        <option value="No. Mesin">No. Mesin</option>
        <option value="No. BPKB">No. BPKB</option>
        <option value="No. Polisi">No. Polisi</option>
    </select>
</div>
<div>
    <label>Nomor</label>
    <input type="text" name="no_sertifikat" class="form-input w-full" placeholder="Masukkan nomor sesuai jenis di atas" required>
</div>

                <div>
                    <label>Bahan</label>
                    <input type="text" name="bahan" class="form-input w-full">
                </div>
                <div>
                    <label>Asal Perolehan</label>
                    <input type="text" name="asal_perolehan" class="form-input w-full">
                </div>
                <div>
                    <label>Tahun Perolehan</label>
                    <input type="number" name="tahun_perolehan" class="form-input w-full" min="1900" max="2099">
                </div>
                <div>
                    <label>Ukuran</label>
                    <input type="text" name="ukuran" class="form-input w-full">
                </div>
                <div>
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-input w-full" min="1">
                </div>
                <div>
                    <label>Satuan</label>
                    <select name="satuan_barang_id" class="form-select w-full" required>
                        <option value="">Pilih Satuan</option>
                        @foreach($satuan as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Kondisi</label>
                    <select name="kondisi_barang_id" class="form-select w-full" required>
                        <option value="">Pilih Kondisi</option>
                        @foreach($kondisi as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kondisi }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label>Harga (Rp)</label>
                    <input type="number" step="0.01" name="harga" class="form-input w-full" required>
                </div>
                <div class="lg:col-span-2">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-input w-full"></textarea>
                </div>
            </div>

            <div class="mt-6 px-6">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Simpan Data
                </button>
            </div>
        </div>
    </form>
@endsection

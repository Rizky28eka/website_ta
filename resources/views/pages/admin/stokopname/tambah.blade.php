@extends('layouts.admin.index')

@section('title', 'Tambah Data Stok Opname')

@section('content')
<form action="{{ route('stokopname.store') }}" method="POST">
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
            <h4 class="card-title">Tambah Data Stok Opname</h4>
        </div>

        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Kode Barang -->
            <div>
                <label for="kode_barang" class="text-sm font-medium text-gray-800 mb-2 block">Kode Barang</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-input w-full"
                       value="{{ old('kode_barang') }}" required>
            </div>

            <!-- Nama Barang -->
            <div>
                <label for="nama_barang" class="text-sm font-medium text-gray-800 mb-2 block">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-input w-full"
                       value="{{ old('nama_barang') }}" required>
            </div>

            <!-- Satuan -->
            <div>
                <label for="satuan" class="text-sm font-medium text-gray-800 mb-2 block">Satuan</label>
                <input type="text" name="satuan" id="satuan" class="form-input w-full"
                       value="{{ old('satuan') }}" required>
            </div>

            <!-- Harga Satuan -->
            <div>
                <label for="harga_satuan_display" class="text-sm font-medium text-gray-800 mb-2 block">Harga Satuan</label>
                <input type="text" id="harga_satuan_display" class="form-input w-full"
                       value="{{ old('harga_satuan') }}" required>
                <input type="hidden" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan') }}">
            </div>

            <!-- Stok Awal -->
            <div>
                <label for="stok_awal" class="text-sm font-medium text-gray-800 mb-2 block">Stok Awal</label>
                <input type="number" name="stok_awal" id="stok_awal" class="form-input w-full"
                       value="{{ old('stok_awal', 0) }}" min="0" required>
            </div>

            <!-- Sisa Stok -->
            <div>
                <label for="sisa_stok" class="text-sm font-medium text-gray-800 mb-2 block">Sisa Stok</label>
                <input type="number" name="sisa_stok" id="sisa_stok" class="form-input w-full bg-gray-100"
                       value="{{ old('sisa_stok', 0) }}" readonly>
            </div>

            <!-- Total Nilai Sisa -->
            <div>
                <label for="total_nilai_sisa_display" class="text-sm font-medium text-gray-800 mb-2 block">Total Nilai Sisa</label>
                <input type="text" id="total_nilai_sisa_display" class="form-input w-full bg-gray-100"
                       value="{{ old('total_nilai_sisa', 0) }}" readonly>
                <input type="hidden" name="total_nilai_sisa" id="total_nilai_sisa" value="{{ old('total_nilai_sisa', 0) }}">
            </div>

            <!-- PPTK -->
            <div>
                <label for="pptk" class="text-sm font-medium text-gray-800 mb-2 block">PPTK</label>
                <input type="text" name="pptk" id="pptk" class="form-input w-full"
                       value="{{ old('pptk') }}">
            </div>

            <!-- Keterangan -->
            <div class="col-span-2">
                <label for="keterangan" class="text-sm font-medium text-gray-800 mb-2 block">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-input w-full">{{ old('keterangan') }}</textarea>
            </div>
        </div>

        <div class="p-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan Data
            </button>
        </div>
    </div>
</form>

<script>
    const hargaDisplay = document.getElementById('harga_satuan_display');
    const hargaHidden = document.getElementById('harga_satuan');
    const stokAwal = document.getElementById('stok_awal');
    const sisaStok = document.getElementById('sisa_stok');
    const totalDisplay = document.getElementById('total_nilai_sisa_display');
    const totalHidden = document.getElementById('total_nilai_sisa');

    function formatRupiah(angka) {
        let number_string = angka.replace(/\D/g, ''),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);
        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah ? 'Rp ' + rupiah : '';
    }

    function updateTotal() {
        let harga = parseInt(hargaHidden.value) || 0;
        let stok = parseFloat(sisaStok.value) || 0;
        let total = harga * stok;
        totalHidden.value = total;
        totalDisplay.value = formatRupiah(total.toString());
    }

    function updateSisaStok() {
        // Untuk input awal, sisa stok = stok awal
        sisaStok.value = stokAwal.value || 0;
        updateTotal();
    }

    hargaDisplay.addEventListener('input', function () {
        let raw = this.value.replace(/\D/g, '');
        this.value = formatRupiah(this.value);
        hargaHidden.value = raw;
        updateTotal();
    });

    stokAwal.addEventListener('input', function () {
        updateSisaStok();
    });

    // Set default on page load
    updateSisaStok();
</script>
@endsection

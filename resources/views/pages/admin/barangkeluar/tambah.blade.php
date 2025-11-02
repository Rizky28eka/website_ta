@extends('layouts.admin.index')

@section('title', 'Tambah Data Barang Keluar')

@section('content')
<form action="{{ route('barangkeluar.store') }}" method="POST">
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
            <h4 class="card-title">Tambah Data Barang Keluar</h4>
        </div>

        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Pilih Barang -->
            <div>
                <label for="stokopname_id" class="text-sm font-medium text-gray-800 mb-2 block">Pilih Barang</label>
                <select name="stokopname_id" id="stokopname_id" class="form-select w-full" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($stokopname as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->kode_barang }} - {{ $item->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Harga Satuan Keluar -->
            <div>
                <label for="harga_satuan_display" class="text-sm font-medium text-gray-800 mb-2 block">Harga Satuan Keluar</label>
                <input type="text" id="harga_satuan_display" class="form-input w-full"
                       value="{{ old('harga_satuan') }}" required>
                <input type="hidden" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan') }}">
            </div>

            <!-- Jumlah Keluar -->
            <div>
                <label for="jumlah" class="text-sm font-medium text-gray-800 mb-2 block">Jumlah Keluar</label>
                <input type="number" name="jumlah" id="jumlah" class="form-input w-full"
                       value="{{ old('jumlah', 0) }}" min="1" required>
            </div>

            <!-- Total Harga Keluar -->
            <div>
                <label for="total_display" class="text-sm font-medium text-gray-800 mb-2 block">Total Harga Keluar</label>
                <input type="text" id="total_display" class="form-input w-full bg-gray-100"
                       value="{{ old('total', 0) }}" readonly>
                <input type="hidden" name="total" id="total" value="{{ old('total', 0) }}">
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
    const jumlah = document.getElementById('jumlah');
    const totalDisplay = document.getElementById('total_display');
    const totalHidden = document.getElementById('total');

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
        let jml = parseFloat(jumlah.value) || 0;
        let total = harga * jml;
        totalHidden.value = total;
        totalDisplay.value = formatRupiah(total.toString());
    }

    hargaDisplay.addEventListener('input', function () {
        let raw = this.value.replace(/\D/g, '');
        this.value = formatRupiah(this.value);
        hargaHidden.value = raw;
        updateTotal();
    });

    jumlah.addEventListener('input', function () {
        updateTotal();
    });

    updateTotal();
</script>
@endsection

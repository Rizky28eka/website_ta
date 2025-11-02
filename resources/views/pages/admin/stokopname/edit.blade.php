@extends('layouts.admin.index')

@section('title', 'Edit Data Stok Opname')

@section('content')
<form action="{{ route('stokopname.update', $stokopname->id) }}" method="POST">
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
            <h4 class="card-title">Edit Data Stok Opname</h4>
        </div>

        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Kode Barang -->
            <div>
                <label class="text-sm font-medium">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang', $stokopname->kode_barang) }}" class="form-input w-full" required>
            </div>

            <!-- Nama Barang -->
            <div>
                <label class="text-sm font-medium">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $stokopname->nama_barang) }}" class="form-input w-full" required>
            </div>

            <!-- Satuan -->
            <div>
                <label class="text-sm font-medium">Satuan</label>
                <input type="text" name="satuan" value="{{ old('satuan', $stokopname->satuan) }}" class="form-input w-full" required>
            </div>

            <!-- Harga Satuan -->
            <div>
                <label class="text-sm font-medium">Harga Satuan</label>
                <input type="text" id="harga_satuan_display" value="{{ 'Rp ' . number_format($stokopname->harga_satuan, 0, ',', '.') }}" class="form-input w-full" required>
                <input type="hidden" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan', $stokopname->harga_satuan) }}">
            </div>

            <!-- Stok Awal -->
            <div>
                <label class="text-sm font-medium">Stok Awal</label>
                <input type="number" name="stok_awal" id="stok_awal" value="{{ old('stok_awal', $stokopname->stok_awal) }}" class="form-input w-full" min="0" required>
            </div>

            <!-- Sisa Stok -->
            <div>
                <label class="text-sm font-medium">Sisa Stok</label>
                <input type="number" name="sisa_stok" id="sisa_stok" value="{{ old('sisa_stok', $stokopname->sisa_stok) }}" class="form-input w-full bg-gray-100" readonly>
            </div>

            <!-- Total Nilai Sisa -->
            <div>
                <label class="text-sm font-medium">Total Nilai Sisa</label>
                <input type="text" id="total_nilai_sisa_display" value="{{ 'Rp ' . number_format($stokopname->total_nilai_sisa, 0, ',', '.') }}" class="form-input w-full bg-gray-100" readonly>
                <input type="hidden" name="total_nilai_sisa" id="total_nilai_sisa" value="{{ old('total_nilai_sisa', $stokopname->total_nilai_sisa) }}">
            </div>

            <!-- PPTK -->
            <div>
                <label class="text-sm font-medium">PPTK</label>
                <input type="text" name="pptk" value="{{ old('pptk', $stokopname->pptk) }}" class="form-input w-full">
            </div>

            <!-- Keterangan -->
            <div class="col-span-2">
                <label class="text-sm font-medium">Keterangan</label>
                <textarea name="keterangan" class="form-input w-full" rows="3">{{ old('keterangan', $stokopname->keterangan) }}</textarea>
            </div>
        </div>

        <div class="p-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Data</button>
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

    hargaDisplay.addEventListener('input', function () {
        let raw = this.value.replace(/\D/g, '');
        this.value = formatRupiah(this.value);
        hargaHidden.value = raw;
        updateTotal();
    });

    stokAwal.addEventListener('input', function () {
        sisaStok.value = stokAwal.value;
        updateTotal();
    });

    updateTotal();
</script>
@endsection

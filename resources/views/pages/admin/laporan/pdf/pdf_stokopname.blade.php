<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan StokOpname</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            background-color: #eee;
        }
        h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan StokOpname</h2>
       <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Kode Barang</th>
                    <th class="border p-2">Nama Barang</th>
                    <th class="border p-2">Satuan</th>
                    <th class="border p-2 text-right">Harga Satuan</th>
                    <th class="border p-2 text-right">Stok Awal</th>
                    <th class="border p-2 text-right">Barang Masuk</th>
                    <th class="border p-2 text-right">Barang Keluar</th>
                    <th class="border p-2 text-right">Sisa Stok</th>
                    <th class="border p-2 text-right">Total Harga</th>
                    <th class="border p-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stokopname as $key => $item)
                    @php
                        $masuk = $item->barangMasuk->sum('jumlah');
                        $keluar = $item->barangKeluar->sum('jumlah');
                        $sisa = $item->stok_awal + $masuk - $keluar;
                        $total = $sisa * $item->harga_satuan;
                    @endphp
                    <tr>
                        <td class="border p-2 text-center">{{ $key + 1 }}</td>
                        <td class="border p-2">{{ $item->kode_barang }}</td>
                        <td class="border p-2">{{ $item->nama_barang }}</td>
                        <td class="border p-2">{{ $item->satuan }}</td>
                        <td class="border p-2 text-right">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="border p-2 text-right">{{ number_format($item->stok_awal) }}</td>
                        <td class="border p-2 text-right">{{ number_format($masuk) }}</td>
                        <td class="border p-2 text-right">{{ number_format($keluar) }}</td>
                        <td class="border p-2 text-right">{{ number_format($sisa) }}</td>
                        <td class="border p-2 text-right">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td class="border p-2">{{ $item->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="border p-4 text-center text-gray-500">
                            Belum ada data stok opname
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris</title>
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
    <h2 style="text-align: center;">Laporan Inventaris</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Register</th>
                <th>Merk / Type</th>
                <th>Jenis Sertifikat</th>
                <th>No Sertifikat</th>
                <th>Bahan</th>
                <th>Asal Perolehan</th>
                <th>Tahun Perolehan</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Kondisi</th>
                <th>Harga (Rp)</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventaris as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->kode_barang ?? '-' }}</td>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $item->register }}</td>
                    <td>{{ $item->merk_type }}</td>
                    <td>{{ $item->jenis_sertifikat }}</td>
                    <td>{{ $item->no_sertifikat }}</td>
                    <td>{{ $item->bahan }}</td>
                    <td>{{ $item->asal_perolehan }}</td>
                    <td>{{ $item->tahun_perolehan }}</td>
                    <td>{{ $item->ukuran }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->satuan->nama_satuan ?? '-' }}</td>
                    <td>{{ $item->kondisi->nama_kondisi ?? '-' }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

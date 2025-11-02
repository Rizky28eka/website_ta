@extends('layouts.admin.index')

@section('title', 'Data Inventaris')

@section('content')
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Data Inventaris</h4>
            <a href="{{ route('inventaris.create') }}" class="btn btn-primary">+ Tambah Inventaris</a>
        </div>

        <div class="card-body overflow-x-auto">
            <table class="table table-bordered w-full mt-4 text-sm">
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inventaris as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->kode_barang }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td>{{ $item->register }}</td>
                            <td>{{ $item->merk_type }}</td>
                             <td>{{ $item->jenis_sertifikat }}</td>
                            <td>{{ $item->no_sertifikat }}</td>
                            <td>{{ $item->bahan }}</td>
                            <td>{{ $item->asal_perolehan }}</td>
                            <td>{{ $item->tahun_perolehan }}</td>
                            <td>{{ $item->ukuran }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->satuan->nama_satuan }}</td>
                            <td>{{ $item->kondisi->nama_kondisi }}</td>
                       
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="whitespace-nowrap">
                                <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="18" class="text-center text-gray-500">Data inventaris belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

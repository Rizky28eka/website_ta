<?php

// app/Models/StokOpname.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StokOpname extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'satuan',
        'harga_satuan',
        'stok_awal',
        'sisa_stok',
        'total_nilai_sisa',
        'pptk',
        'keterangan',
    ];

    // Relasi ke BarangMasuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'stokopname_id');
    }

    // Relasi ke BarangKeluar
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'stokopname_id');
    }

    // Hitung sisa stok
    public function hitungSisaStok()
    {
        $totalMasuk = $this->barangMasuk()->sum('jumlah');
        $totalKeluar = $this->barangKeluar()->sum('jumlah');

        $this->sisa_stok = $this->stok_awal + $totalMasuk - $totalKeluar;
        $this->total_nilai_sisa = $this->sisa_stok * $this->harga_satuan;
        $this->save();
    }
}

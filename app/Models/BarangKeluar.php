<?php

// app/Models/BarangKeluar.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $fillable = ['stokopname_id', 'jumlah', 'harga_satuan', 'total'];

    public function stokopname()
    {
        return $this->belongsTo(StokOpname::class);
    }
}

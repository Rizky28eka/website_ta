<?php

// app/Models/BarangMasuk.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';

    protected $fillable = [
        'stokopname_id',
        'jumlah',
        'harga_satuan',
        'total', // ✅ tambahkan total
    ];

    public function stokopname()
    {
        return $this->belongsTo(StokOpname::class);
    }
}

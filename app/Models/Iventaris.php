<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'barang_id',
        'register',
        'merk_type',
        'jenis_sertifikat',
        'no_sertifikat',
        'bahan',
        'asal_perolehan',
        'tahun_perolehan',
        'ukuran',
        'jumlah',
        'satuan_barang_id',
        'kondisi_barang_id',
        'harga',
        'keterangan',
    ];

    // Relasi
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanBarang::class, 'satuan_barang_id');
    }

    public function kondisi()
    {
        return $this->belongsTo(KondisiBarang::class, 'kondisi_barang_id');
    }
}

<?php

// database/migrations/2025_08_10_000002_create_barang_keluar_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stokopname_id')->constrained('stok_opnames')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2);
              $table->decimal('total', 20, 2); // total harga masuk (harga_satuan × jumlah)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};

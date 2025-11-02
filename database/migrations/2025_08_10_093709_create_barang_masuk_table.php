<?php

// database/migrations/2025_08_10_000001_create_barang_masuk_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stokopname_id')
                  ->constrained('stok_opnames')
                  ->onDelete('cascade');
            $table->integer('jumlah'); // jumlah barang masuk
            $table->decimal('harga_satuan', 15, 2); // harga per satuan
            $table->decimal('total', 20, 2); // total harga masuk (harga_satuan × jumlah)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};

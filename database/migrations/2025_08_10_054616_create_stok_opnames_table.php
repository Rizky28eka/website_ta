<?php

// database/migrations/2025_08_10_000000_create_stok_opnames_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stok_opnames', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->integer('stok_awal')->default(0);
            $table->integer('sisa_stok')->default(0);
            $table->decimal('total_nilai_sisa', 20, 2)->default(0);
            $table->string('pptk')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok_opnames');
    }
};

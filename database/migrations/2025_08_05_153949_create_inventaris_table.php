<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->string('register', 50)->nullable();
            $table->string('merk_type')->nullable();

            $table->string('jenis_sertifikat', 50)->nullable(); // ✅ Tambahan
            $table->text('no_sertifikat')->nullable();          // ✅ Tambahan

            $table->string('bahan', 50)->nullable();
            $table->string('asal_perolehan', 100)->nullable();
            $table->year('tahun_perolehan')->nullable();
            $table->text('ukuran')->nullable();
            $table->integer('jumlah')->default(1);
            $table->unsignedBigInteger('satuan_barang_id')->nullable();
            $table->unsignedBigInteger('kondisi_barang_id')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Relasi
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('satuan_barang_id')->references('id')->on('satuan_barang')->onDelete('set null');
            $table->foreign('kondisi_barang_id')->references('id')->on('kondisi_barang')->onDelete('set null');
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}

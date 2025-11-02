<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_barang')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
}

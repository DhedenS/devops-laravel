<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('kategori');
            $table->string('sumber_transaksi');
            $table->text('deskripsi');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_petani')->nullable();
            $table->unsignedBigInteger('id_penyewaan')->nullable();
            $table->unsignedBigInteger('id_penjualan')->nullable();
            $table->unsignedBigInteger('id_pengiriman')->nullable();
            $table->timestamps();

            $table->foreign('id_petani')->references('id_petani')->on('petani');
            $table->foreign('id_penyewaan')->references('id_penyewaan')->on('penyewaan');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan_produk');
            $table->foreign('id_pengiriman')->references('id_pengiriman')->on('pengiriman_padi');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};

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
        Schema::create('penjualan_produk', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->unsignedBigInteger('id_petani');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah');
            $table->decimal('total_harga', 12, 2);
            $table->timestamps();
        
            $table->foreign('id_petani')->references('id_petani')->on('petani');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_produk');
    }
};

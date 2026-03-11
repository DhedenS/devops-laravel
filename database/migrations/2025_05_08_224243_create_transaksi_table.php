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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_petani');
            $table->date('tanggal_transaksi');
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('status');
            $table->string('jenis_transaksi');
            $table->string('tipe_transaksi');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('id_petani')->references('id_petani')->on('petani');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }

    function scopeCurrentMonth($query)
    {
        return $query->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
    }

    function scopeLastMonth($query)
    {
        return $query->whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();
    }
};

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
        Schema::create('pengajuan_sewa', function (Blueprint $table) {
            $table->string('id_pengajuan')->primary();
            $table->unsignedBigInteger('id_petani');
            $table->unsignedBigInteger('id_sewa');
            $table->date('tanggal_sewa');
            $table->integer('lama_sewa_hari');
            $table->integer('total_harga');
            $table->enum('status', ['menunggu persetujuan', 'disetujui', 'ditolak'])->default('menunggu persetujuan');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_petani')->references('id_petani')->on('petani');
            $table->foreign('id_sewa')->references('id_sewa')->on('jenis_sewa');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_sewa');
    }
};

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
        Schema::create('pengajuan_padi', function (Blueprint $table) {
            $table->string('id_pengajuan')->primary();
            $table->unsignedBigInteger('id_petani');
            $table->unsignedBigInteger('id_padi');
            $table->boolean('perlu_mobil');
            $table->integer('jumlah_karung');
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['menunggu persetujuan', 'disetujui', 'ditolak'])->default('menunggu persetujuan');
            $table->integer('jumlah_kg')->nullable();
            $table->integer('total_harga')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_petani')->references('id_petani')->on('petani');
            $table->foreign('id_padi')->references('id_padi')->on('padi');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_padi');
    }
};

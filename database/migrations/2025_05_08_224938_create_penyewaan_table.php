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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id('id_penyewaan');
            $table->unsignedBigInteger('id_petani');
            $table->unsignedBigInteger('id_sewa');
            $table->decimal('biaya_sewa', 10, 2);
            $table->date('tanggal_sewa');
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
        Schema::dropIfExists('penyewaan');
    }
};

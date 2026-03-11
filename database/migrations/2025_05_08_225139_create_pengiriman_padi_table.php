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
        Schema::create('pengiriman_padi', function (Blueprint $table) {
            $table->id('id_pengiriman');
            $table->unsignedBigInteger('id_padi');
            $table->string('tujuan');
            $table->date('tanggal');
            $table->integer('jumlah_kg');
            $table->decimal('harga', 10, 2);
            $table->decimal('total', 12, 2);
            $table->timestamps();
        
            $table->foreign('id_padi')->references('id_padi')->on('padi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman_padi');
    }
};

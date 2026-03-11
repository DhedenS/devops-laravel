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
        Schema::create('padi', function (Blueprint $table) {
            $table->id('id_padi');
            $table->string('nama_padi');
            $table->string('warna');
            $table->string('bentuk');
            $table->string('tekstur');
            $table->decimal('harga', 10, 2);
            $table->integer('stok')->default(0);
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padi');
    }
};

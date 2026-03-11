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
        Schema::create('hutang_petani', function (Blueprint $table) {
            $table->id('id_hutang');
            $table->unsignedBigInteger('id_petani');
            $table->decimal('jumlah_hutang', 12, 2);
            $table->text('keterangan');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_lunas')->nullable();
            $table->string('status');
            $table->timestamps();
        
            $table->foreign('id_petani')->references('id_petani')->on('petani');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutang_petani');
    }
};

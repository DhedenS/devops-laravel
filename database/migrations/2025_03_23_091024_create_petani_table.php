<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('petani', function (Blueprint $table) {
            $table->id('id_petani');
            $table->string('nama_lengkap');
            $table->string('username')->unique();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('logo')->nullable();
            $table->string('password');
            $table->timestamps();
            $table->enum('role', ['admin', 'petani'])->default('petani');
        });
    }

    public function down()
    {
        Schema::dropIfExists('petani');
    }
};

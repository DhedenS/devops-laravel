<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Padi extends Model
{
    use HasFactory;

    protected $table = 'padi';
    protected $primaryKey = 'id_padi';

    protected $fillable = [
        'nama_padi',
        'warna',
        'bentuk',
        'tekstur',
        'harga',
        'stok',
        'gambar'
    ];

    // Relasi: satu padi bisa memiliki banyak produksi beras
    public function produksis()
    {
        return $this->hasMany(ProduksiBeras::class, 'id_padi', 'id_padi');
    }
}

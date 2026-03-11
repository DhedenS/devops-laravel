<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PengajuanSewa;

class JenisSewa extends Model
{
    protected $table = 'jenis_sewa';
    protected $primaryKey = 'id_sewa';
    public $timestamps = true;

    protected $fillable = [
        'nama_sewa', 'harga_sewa',
    ];

    public function pengajuanSewa()
    {
        return $this->hasMany(PengajuanSewa::class, 'id_sewa');
    }
}

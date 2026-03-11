<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPadi extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_padi';
    protected $primaryKey = 'id_pengajuan';
    public $incrementing = false;

    protected $fillable = [
    'id_petani',
    'id_padi',
    'perlu_mobil',
    'jumlah_karung',
    'tanggal_pengajuan',
    'status',
    'jumlah_kg',
    'total_harga',
    'keterangan',
    ];

    // Relasi ke Petani
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani', 'id_petani');
    }

    // Relasi ke Padi
    public function padi()
    {
        return $this->belongsTo(Padi::class, 'id_padi', 'id_padi');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $last = self::orderBy('id_pengajuan', 'desc')->first();
            $number = 1;

            if ($last) {
                $lastNumber = (int) str_replace('PADI-', '', $last->id_pengajuan);
                $number = $lastNumber + 1;
            }

            $model->id_pengajuan = 'PADI-' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }
}

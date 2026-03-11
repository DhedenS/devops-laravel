<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PengajuanSewa extends Model
{
    protected $table = 'pengajuan_sewa';
    protected $primaryKey = 'id_pengajuan';
    public $incrementing = false;
    protected $fillable = [
        'id_pengajuan', 'id_petani', 'id_sewa', 'tanggal_sewa', 'lama_sewa_hari', 'total_harga', 'status', 'keterangan'
    ];

    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani');
    }

    public function jenisSewa()
    {
        return $this->belongsTo(JenisSewa::class, 'id_sewa');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $last = self::orderBy('id_pengajuan', 'desc')->first();
            $number = 1;

            if ($last) {
                $lastNumber = (int) str_replace('SEWA-', '', $last->id_pengajuan);
                $number = $lastNumber + 1;
            }

            $model->id_pengajuan = 'SEWA-' . str_pad($number, 3, '0', STR_PAD_LEFT);

            $harga = JenisSewa::find($model->id_sewa)?->harga_sewa ?? 0;
            $model->total_harga = $harga * $model->lama_sewa_hari;
        });
    }
}

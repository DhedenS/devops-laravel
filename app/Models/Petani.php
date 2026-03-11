<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petani extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'petani';
    // protected $guard = 'petani';
    public $incrementing = true;
    protected $primaryKey = 'id_petani';
    protected $fillable = [
        'nama_lengkap',
        'username',
        'gender',
        'email',
        'no_telp',
        'alamat',
        'logo',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
    
    function scopeCurrentMonth($query)
    {
        return $query->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
    }

    function scopeLastMonth($query)
    {
        return $query->whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();
    }
}

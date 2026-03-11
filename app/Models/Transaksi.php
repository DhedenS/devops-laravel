<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksi';

    function scopeCurrentMonth($query)
    {
       return $query->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month);
    }

    function scopeLastMonth($query){
        return $query->whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->sum();

    }
}

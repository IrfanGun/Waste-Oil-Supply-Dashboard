<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ringkasan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'saldo_id',
        'total_pasokan',
        'total_pendapatan',
        'pasokan_sekarang',
        'pendapatan_sekarang',
        'update_pendapatan',
        'berhasil',
        'menunggu',
        'gagal'
    ];
}

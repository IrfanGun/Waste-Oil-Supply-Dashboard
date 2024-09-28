<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengiriman extends Model
{
    use HasFactory, SoftDeletes;

    public function riwayatPenarikan() {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'user_id',
        'berhasil',
        'menunggu',
        'ditolak',
        'kota'
    ];
}

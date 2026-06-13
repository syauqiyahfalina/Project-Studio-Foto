<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'reservasi_id',
        'tanggal_bayar',
        'jumlah',
        'metode_pembayaran',
        'bukti_bayar',
        'status',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}
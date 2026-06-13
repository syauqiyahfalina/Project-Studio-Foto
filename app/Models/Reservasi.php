<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';

    protected $fillable = [
        'user_id',
        'paket_id',
        'studio_id',
        'fotografer_id',
        'tanggal_reservasi',
        'jam_mulai',
        'jam_selesai',
        'total_harga',
        'status',
    ];

    public function detailReservasi()
    {
        return $this->hasMany(DetailReservasi::class);
    }
    public function pembayaran()
{
    return $this->hasMany(Pembayaran::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function getDisplayNameAttribute()
{
    return 'Reservasi #' . $this->id .
           ' - ' . $this->tanggal_reservasi;
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservasi extends Model
{
    protected $fillable = [
    'user_id',
    'fotografer_id',
    'paket_id',
    'studio_id', // <--- Tambahkan ini
    'tanggal_reservasi',
    // ... kolom lainnya
];
    protected $table = 'reservasis';
    protected $guarded = [];

    // Relasi User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
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
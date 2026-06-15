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

    // Relasi Fotografer
    public function fotografer(): BelongsTo
    {
        return $this->belongsTo(Fotografer::class, 'fotografer_id');
    }

    // Relasi Paket
    public function paket(): BelongsTo
    {
        return $this->belongsTo(PaketPoto::class, 'paket_id');
    }

    // TAMBAHKAN INI UNTUK STUDIO
    public function studio(): BelongsTo
    {
        // Pastikan nama kolom 'studio_id' sesuai dengan database lo
        return $this->belongsTo(Studio::class, 'studio_id');
    }
}
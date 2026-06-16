<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservasi extends Model
{
    protected $table = 'reservasis';
    
    protected $fillable = [
        'user_id',
        'fotografer_id',
        'paket_id',
        'studio_id',
        'tanggal_reservasi',
        // ... masukkan nama kolom lainnya di sini jika ada
    ];

    // Menggunakan guarded kosong jika sudah menggunakan fillable (pilih salah satu, atau biarkan kosong)
    protected $guarded = [];

    // Relasi Ke User (Hanya ada satu sekarang)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Pembayaran
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }

    // Custom Attribute untuk menampilkan nama di Filament
    public function getDisplayNameAttribute()
    {
        return 'Reservasi #' . $this->id . ' - ' . $this->tanggal_reservasi;
    }
}
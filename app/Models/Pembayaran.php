<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    // Mengubah nama tabel menjadi plural/jamak ('pembayarans') sesuai standar Laravel & Database lo
    protected $table = 'pembayarans';

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
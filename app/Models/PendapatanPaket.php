<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendapatanPaket extends Model
{
    // Mengizinkan kolom-kolom ini berinteraksi dengan Filament
    protected $fillable = [
        'id_paket',
        'nama_paket',
        'harga',
        'total_dipesan',
        'total_pendapatan',
    ];
}

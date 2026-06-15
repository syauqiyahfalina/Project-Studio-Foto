<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Hubungkan model ini ke nama tabel jamak yang ada di database lo
    protected $table = 'galeris';

    protected $fillable = [
        'nama_galeri', // sesuaikan dengan kolom form lo
        'foto',
        'deskripsi',
    ];
}
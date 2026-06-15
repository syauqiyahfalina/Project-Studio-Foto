<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = [
        'nama_studio',
        'kapasitas',
        'deskripsi',
        'foto',
        'status',
        'harga_per_jam'
    ];
}   
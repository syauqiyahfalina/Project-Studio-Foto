<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'paket_poto';

    protected $fillable = [
        'nama_paket',
        'harga',
        'durasi',
        'deskripsi',
        'foto',
    ];

    protected $appends = [
        'foto_url',
    ];

    public function getFotoUrlAttribute()
    {
        return asset('storage/' . $this->foto);
    }
}
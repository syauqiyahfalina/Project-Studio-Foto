<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketPoto extends Model
{
    // Karena tabelnya kita namain 'paket_poto', kita definisikan di sini
    protected $table = 'paket_poto'; 
    
    protected $fillable = [
    'nama_paket',
    'harga',
    'durasi', // <--- Tambahkan ini
    'deskripsi',
    'foto',
];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotografer extends Model
{
    // Tambahkan ini biar Laravel tahu dia harus cari tabel 'fotografers'
    protected $table = 'fotografers'; 
    protected $guarded = [];
}
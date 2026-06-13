<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotografer extends Model
{
    protected $table = 'fotografer';

    protected $fillable = [
        'nama_fotografer',
        'email',
        'no_hp',
        'spesialisasi',
        'foto',
    ];
}
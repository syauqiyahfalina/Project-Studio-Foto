<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailReservasi extends Model
{
    protected $table = 'detail_reservasis';
    protected $guarded = [];
    protected $fillable = [
        'reservasi_id',
        'fotografer_id',
    ];

    public function reservasi()
    {
    return $this->belongsTo(Reservasi::class, 'reservasi_id');
    }

    public function fotografer()
    {
        return $this->belongsTo(Fotografer::class, 'fotografer_id');
    }
}
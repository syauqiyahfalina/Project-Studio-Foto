<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        Pembayaran::create([
            'reservasi_id' => 1, // Pembayaran untuk reservasi pertama
            'tanggal_bayar' => '2026-06-15',
            'jumlah' => 350000,
            'metode_pembayaran' => 'Transfer Bank',
            'bukti_bayar' => null,
            'status' => 'Lunas',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Reservasi;
use Illuminate\Database\Seeder;

class ReservasiSeeder extends Seeder
{
    public function run(): void
    {
        Reservasi::create([
            'user_id' => 1,       // Mengacu ke Admin/User pertama
            'paket_id' => 1,      // Mengacu ke Paket Wisuda Silver
            'studio_id' => 1,     // Mengacu ke Studio Indoor
            'fotografer_id' => 2, // Mengacu ke Siti Nurhaliza
            'tanggal_reservasi' => '2026-06-20',
            'jam_mulai' => '10:00:00',
            'jam_selesai' => '11:00:00',
            'total_harga' => 350000,
            'status' => 'Disetujui',
        ]);

        Reservasi::create([
            'user_id' => 1,
            'paket_id' => 2,      // Mengacu ke Paket Prewedding Gold
            'studio_id' => 2,     // Mengacu ke Studio Outdoor
            'fotografer_id' => 1, // Mengacu ke Alex Baskara
            'tanggal_reservasi' => '2026-06-25',
            'jam_mulai' => '13:00:00',
            'jam_selesai' => '16:00:00',
            'total_harga' => 1500000,
            'status' => 'Pending',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PendapatanPaket;
use Illuminate\Database\Seeder;

class PendapatanPaketSeeder extends Seeder
{
    public function run(): void
    {
        PendapatanPaket::create([
            'id_paket' => 'PKT-001',
            'nama_paket' => 'Paket Wisuda Silver',
            'harga' => 350000,
            'total_dipesan' => 1,
            'total_pendapatan' => 350000,
        ]);
    }
}

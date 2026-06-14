<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        Package::create([
            'nama_paket' => 'Paket Wisuda Silver',
            'harga' => 350000,
            'durasi' => '1 Jam',
            'deskripsi' => 'Termasuk 10 foto edit, cetak 2 lembar ukuran 4R.',
            'foto' => null,
        ]);

        Package::create([
            'nama_paket' => 'Paket Prewedding Gold',
            'harga' => 1500000,
            'durasi' => '3 Jam',
            'deskripsi' => 'Termasuk semua file foto, edit 25 foto, cetak kanvas besar.',
            'foto' => null,
        ]);
    }
}

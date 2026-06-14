<?php

namespace Database\Seeders;

use App\Models\Fotografer;
use Illuminate\Database\Seeder;

class FotograferSeeder extends Seeder
{
    public function run(): void
    {
        Fotografer::create([
            'nama_fotografer' => 'Alex Baskara',
            'email' => 'alex@studio.com',
            'no_hp' => '081234567890',
            'spesialisasi' => 'Prewedding & Wedding',
            'foto' => null,
        ]);

        Fotografer::create([
            'nama_fotografer' => 'Siti Nurhaliza',
            'email' => 'siti@studio.com',
            'no_hp' => '089876543210',
            'spesialisasi' => 'Graduation & Family',
            'foto' => null,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Studio;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    public function run(): void
    {
        Studio::create([
            'nama_studio' => 'Studio Indoor Premium A',
            'kapasitas' => 10,
            'deskripsi' => 'Studio ber-AC dengan background minimalis dan pencahayaan lampu pro.',
            'foto' => null,
            'status' => 'Tersedia',
        ]);

        Studio::create([
            'nama_studio' => 'Studio Outdoor Tematik B',
            'kapasitas' => 20,
            'deskripsi' => 'Studio semi-outdoor bertema taman dan estetik klasik.',
            'foto' => null,
            'status' => 'Tersedia',
        ]);
    }
}

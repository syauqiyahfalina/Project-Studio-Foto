<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::create([
            'judul' => 'Portofolio Prewedding Klasik',
            'kategori' => 'Prewedding',
            'foto' => 'default-prewed.jpg',
        ]);
    }
}

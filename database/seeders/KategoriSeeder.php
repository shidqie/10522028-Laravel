<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Topi',
        ]);

        Kategori::create([
            'nama_kategori' => 'Baju',
        ]);

        Kategori::create([
            'nama_kategori' => 'Celana',
        ]);

        Kategori::create([
            'nama_kategori' => 'Sepatu',
        ]);
    }
}
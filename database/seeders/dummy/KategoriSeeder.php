<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Carbon\Carbon;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Akademik',
            'Fasilitas',
            'Kesehatan',
            'Keamanan',
            'Sosial',
            'Bullying',
            'Ekstrakurikuler',
            'Administrasi',
            'Guru',
            'Lainnya'
        ];

        foreach ($kategori as $k) {
            Kategori::create([
                'nama_kategori' => $k,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
} 
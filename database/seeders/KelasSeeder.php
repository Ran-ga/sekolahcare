<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = [
            // Kelas X
            ['nama' => 'X IPA 1', 'tingkat' => 'X', 'jurusan' => 'IPA', 'kapasitas' => 30],
            ['nama' => 'X IPS 1', 'tingkat' => 'X', 'jurusan' => 'IPS', 'kapasitas' => 30],
            ['nama' => 'X Bahasa', 'tingkat' => 'X', 'jurusan' => 'Bahasa', 'kapasitas' => 30],
            
            // Kelas XI
            ['nama' => 'XI IPA 1', 'tingkat' => 'XI', 'jurusan' => 'IPA', 'kapasitas' => 30],
            ['nama' => 'XI IPS 1', 'tingkat' => 'XI', 'jurusan' => 'IPS', 'kapasitas' => 30],
            ['nama' => 'XI Bahasa', 'tingkat' => 'XI', 'jurusan' => 'Bahasa', 'kapasitas' => 30],
            
            // Kelas XII
            ['nama' => 'XII IPA 1', 'tingkat' => 'XII', 'jurusan' => 'IPA', 'kapasitas' => 30],
            ['nama' => 'XII IPS 1', 'tingkat' => 'XII', 'jurusan' => 'IPS', 'kapasitas' => 30],
            ['nama' => 'XII Bahasa', 'tingkat' => 'XII', 'jurusan' => 'Bahasa', 'kapasitas' => 30],
        ];

        foreach ($kelas as $k) {
            Kelas::create([
                'nama' => $k['nama'],
                'tingkat' => $k['tingkat'],
                'jurusan' => $k['jurusan'],
                'kapasitas' => $k['kapasitas'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
} 
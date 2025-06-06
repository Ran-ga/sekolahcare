<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sekolahcare.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nomor_induk' => 'ADM001',
            'no_hp' => '081234567890',
            'jenis_kelamin' => 'L',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create kepala sekolah
        User::create([
            'name' => 'Dr. Budi Santoso, M.Pd.',
            'email' => 'kepsek@sekolahcare.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_sekolah',
            'nomor_induk' => 'KS001',
            'no_hp' => '081234567891',
            'jenis_kelamin' => 'L',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create guru BK
        $guruBk = [
            ['name' => 'Dra. Siti Aminah', 'email' => 'gurubk1@sekolahcare.com', 'jenis_kelamin' => 'P'],
            ['name' => 'Ahmad Hidayat, S.Pd.', 'email' => 'gurubk2@sekolahcare.com', 'jenis_kelamin' => 'L'],
        ];

        foreach ($guruBk as $index => $guru) {
            User::create([
                'name' => $guru['name'],
                'email' => $guru['email'],
                'password' => Hash::make('password'),
                'role' => 'guru_bk',
                'nomor_induk' => 'BK' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'no_hp' => '0812345678' . str_pad($index + 2, 2, '0', STR_PAD_LEFT),
                'jenis_kelamin' => $guru['jenis_kelamin'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Create wali kelas
        $kelas = Kelas::all();
        $waliKelas = [
            'X IPA 1' => ['name' => 'Dr. Rudi Hartono, M.Pd.', 'jenis_kelamin' => 'L', 'email' => 'rudi.hartono.xipa1@sekolahcare.com'],
            'X IPS 1' => ['name' => 'Nurul Hidayah, M.Pd.', 'jenis_kelamin' => 'P', 'email' => 'nurul.hidayah.xips1@sekolahcare.com'],
            'X Bahasa' => ['name' => 'Dewi Lestari, S.Pd.', 'jenis_kelamin' => 'P', 'email' => 'dewi.lestari.xbahasa@sekolahcare.com'],
            'XI IPA 1' => ['name' => 'Rudi Hartono, M.Pd.', 'jenis_kelamin' => 'L', 'email' => 'rudi.hartono.xiipa1@sekolahcare.com'],
            'XI IPS 1' => ['name' => 'Hidayah Nurul, S.Pd.', 'jenis_kelamin' => 'P', 'email' => 'hidayah.nurul.xiips1@sekolahcare.com'],
            'XI Bahasa' => ['name' => 'Lestari Dewi, S.Pd.', 'jenis_kelamin' => 'P', 'email' => 'lestari.dewi.xibahasa@sekolahcare.com'],
            'XII IPA 1' => ['name' => 'Hartono Rudi, S.Pd.', 'jenis_kelamin' => 'L', 'email' => 'hartono.rudi.xiiipa1@sekolahcare.com'],
            'XII IPS 1' => ['name' => 'Nurul Hidayah, S.Pd.', 'jenis_kelamin' => 'P', 'email' => 'nurul.hidayah.xiiips1@sekolahcare.com'],
            'XII Bahasa' => ['name' => 'Dewi Lestari, S.Pd.', 'jenis_kelamin' => 'P', 'email' => 'dewi.lestari.xiibahasa@sekolahcare.com'],
        ];

        foreach ($kelas as $index => $k) {
            User::create([
                'name' => $waliKelas[$k->nama]['name'],
                'email' => $waliKelas[$k->nama]['email'],
                'password' => Hash::make('password'),
                'role' => 'wali_kelas',
                'nomor_induk' => 'WK' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'no_hp' => '0812345679' . str_pad($index + 1, 2, '0', STR_PAD_LEFT),
                'jenis_kelamin' => $waliKelas[$k->nama]['jenis_kelamin'],
                'kelas_id' => $k->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Create students (10 students per class)
        $firstNames = ['Ahmad', 'Budi', 'Citra', 'Dewi', 'Eka', 'Fajar', 'Gita', 'Hadi', 'Indah', 'Joko'];
        $lastNames = ['Putra', 'Santoso', 'Wijaya', 'Sari', 'Nugroho', 'Pratama', 'Kusuma', 'Hidayat', 'Lestari', 'Purnama'];
        $jenisKelamin = ['L', 'P'];

        $studentCounter = 1;
        foreach ($kelas as $k) {
            for ($i = 1; $i <= 10; $i++) {
                $firstName = $firstNames[array_rand($firstNames)];
                $lastName = $lastNames[array_rand($lastNames)];
                $name = $firstName . ' ' . $lastName;
                $jenisKelaminRandom = $jenisKelamin[array_rand($jenisKelamin)];
                
                User::create([
                    'name' => $name,
                    'email' => strtolower(str_replace(' ', '', $firstName . $lastName)) . $studentCounter . '@sekolahcare.com',
                    'password' => Hash::make('password'),
                    'role' => 'siswa',
                    'nomor_induk' => str_pad($studentCounter, 6, '0', STR_PAD_LEFT),
                    'no_hp' => '0812345' . str_pad($studentCounter, 5, '0', STR_PAD_LEFT),
                    'jenis_kelamin' => $jenisKelaminRandom,
                    'kelas_id' => $k->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $studentCounter++;
            }
        }
    }
} 
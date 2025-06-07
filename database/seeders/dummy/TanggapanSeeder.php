<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\User;
use Carbon\Carbon;

class TanggapanSeeder extends Seeder
{
    public function run(): void
    {
        // Get all pengaduan
        $pengaduan = Pengaduan::all();
        
        // Get staff users (guru BK, wali kelas, kepala sekolah)
        $staffUsers = User::whereIn('role', ['guru_bk', 'wali_kelas', 'kepala_sekolah'])->get();
        
        // Sample tanggapan
        $tanggapanList = [
            'Terima kasih telah melaporkan masalah ini. Tim kami akan segera menindaklanjuti.',
            'Kami telah menerima laporan Anda dan sedang memprosesnya.',
            'Terima kasih atas informasinya. Kami akan segera menangani masalah ini.',
            'Laporan Anda telah kami terima dan sedang dalam penanganan.',
            'Kami akan segera menindaklanjuti laporan Anda.',
            'Terima kasih atas kesabaran Anda. Tim kami sedang bekerja untuk menyelesaikan masalah ini.',
            'Kami telah mencatat laporan Anda dan akan segera mengambil tindakan yang diperlukan.',
            'Terima kasih telah menginformasikan hal ini kepada kami.',
            'Kami akan segera memproses laporan Anda.',
            'Tim kami sedang menangani masalah ini.'
        ];

        foreach ($pengaduan as $p) {
            // Generate 1-3 tanggapan per pengaduan
            $numTanggapan = rand(1, 3);
            
            for ($i = 0; $i < $numTanggapan; $i++) {
                // Random staff user
                $staff = $staffUsers->random();
                
                // Random tanggapan
                $tanggapan = $tanggapanList[array_rand($tanggapanList)];
                
                // Create tanggapan
                Tanggapan::create([
                    'pengaduan_id' => $p->id,
                    'user_id' => $staff->id,
                    'tanggapan' => $tanggapan,
                    'created_at' => Carbon::parse($p->created_at)->addHours(rand(1, 24)),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
} 
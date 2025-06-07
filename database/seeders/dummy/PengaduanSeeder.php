<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Kategori;
use Carbon\Carbon;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $students = User::where('role', 'siswa')->get();
        $categories = Kategori::all();
        $statuses = ['Menunggu', 'Diproses', 'Selesai'];

        // Sample complaint titles
        $titles = [
            'Akademik' => [
                'Kesulitan memahami materi',
                'Permasalahan dengan tugas kelompok',
                'Kendala dalam pembelajaran online',
                'Permintaan bimbingan belajar',
                'Masalah dengan jadwal ujian'
            ],
            'Fasilitas' => [
                'AC tidak berfungsi',
                'Proyektor rusak',
                'Toilet kotor',
                'Kursi rusak',
                'Lampu kelas mati'
            ],
            'Kesehatan' => [
                'Sakit kepala berkelanjutan',
                'Stres karena tugas',
                'Masalah penglihatan',
                'Kelelahan fisik',
                'Gangguan tidur'
            ],
            'Keamanan' => [
                'Pencurian barang',
                'Pelecehan verbal',
                'Pengancaman',
                'Pemalakan',
                'Vandalisme'
            ],
            'Sosial' => [
                'Konflik dengan teman',
                'Kesulitan bergaul',
                'Isolasi sosial',
                'Tekanan kelompok',
                'Masalah komunikasi'
            ],
            'Bullying' => [
                'Dihina di media sosial',
                'Dikucilkan teman',
                'Diancam secara fisik',
                'Dilecehkan secara verbal',
                'Dibully di kelas'
            ],
            'Ekstrakurikuler' => [
                'Jadwal bentrok',
                'Fasilitas tidak memadai',
                'Pembina kurang aktif',
                'Anggaran tidak jelas',
                'Kegiatan monoton'
            ],
            'Administrasi' => [
                'Masalah pembayaran SPP',
                'Kartu pelajar hilang',
                'Izin tidak diproses',
                'Surat keterangan tertunda',
                'Masalah administrasi nilai'
            ],
            'Guru' => [
                'Guru tidak hadir',
                'Metode mengajar kurang jelas',
                'Pemberian tugas berlebihan',
                'Kurangnya bimbingan',
                'Komunikasi kurang baik'
            ],
            'Lainnya' => [
                'Kebisingan di lingkungan sekolah',
                'Masalah transportasi',
                'Kantin tidak sehat',
                'Parkir tidak tertib',
                'Masalah lingkungan'
            ]
        ];

        // Sample complaint content
        $contents = [
            'Mohon bantuan untuk menangani masalah ini.',
            'Saya mengalami kesulitan dengan hal ini dan membutuhkan bantuan.',
            'Tolong perhatikan masalah ini karena sudah berlangsung cukup lama.',
            'Saya harap masalah ini bisa segera ditangani.',
            'Mohon bantuan untuk menyelesaikan permasalahan ini.'
        ];

        // Create complaints for 2023/2024 (July 20, 2023 - July 19, 2024)
        $startDate2023 = Carbon::create(2023, 7, 20);
        $endDate2023 = Carbon::create(2024, 7, 19);

        // Create complaints for 2024/2025 (July 20, 2024 - May 30, 2025)
        $startDate2024 = Carbon::create(2024, 7, 20);
        $endDate2024 = Carbon::create(2025, 5, 30);

        // Generate 200 complaints for 2023/2024
        for ($i = 0; $i < 200; $i++) {
            $category = $categories->random();
            $student = $students->random();
            $status = $statuses[array_rand($statuses)];
            $createdAt = Carbon::createFromTimestamp(rand($startDate2023->timestamp, $endDate2023->timestamp));

            Pengaduan::create([
                'siswa_id' => $student->id,
                'kategori_id' => $category->id,
                'judul' => $titles[$category->nama_kategori][array_rand($titles[$category->nama_kategori])],
                'isi_pengaduan' => $contents[array_rand($contents)],
                'status' => $status,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        }

        // Generate 150 complaints for 2024/2025 (sampai 30 Mei 2025)
        for ($i = 0; $i < 150; $i++) {
            $category = $categories->random();
            $student = $students->random();
            $status = $statuses[array_rand($statuses)];
            $createdAt = Carbon::createFromTimestamp(rand($startDate2024->timestamp, $endDate2024->timestamp));

            Pengaduan::create([
                'siswa_id' => $student->id,
                'kategori_id' => $category->id,
                'judul' => $titles[$category->nama_kategori][array_rand($titles[$category->nama_kategori])],
                'isi_pengaduan' => $contents[array_rand($contents)],
                'status' => $status,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        }
    }
} 
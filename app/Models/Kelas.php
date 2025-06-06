<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    
    protected $fillable = [
        'nama',
        'tingkat',
        'jurusan',
        'kapasitas'
    ];

    // Relasi dengan User (Siswa)
    public function siswa()
    {
        return $this->hasMany(User::class, 'kelas_id')->where('role', 'siswa');
    }

    // Relasi dengan User (Wali Kelas)
    public function waliKelas()
    {
        return $this->hasOne(User::class, 'kelas_id')->where('role', 'wali_kelas');
    }

    public function pengaduan()
    {
        return $this->hasManyThrough(Pengaduan::class, User::class, 'kelas_id', 'siswa_id')
            ->where('users.role', 'siswa');
    }
} 
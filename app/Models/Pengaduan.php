<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    
    protected $fillable = [
        'siswa_id',
        'judul',
        'isi_pengaduan',
        'foto_pendukung',
        'status',
        'kategori_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }
} 
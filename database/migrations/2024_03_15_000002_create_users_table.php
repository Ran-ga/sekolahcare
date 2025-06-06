<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('Nama lengkap pengguna');
            $table->string('email', 100)->unique()->nullable()->comment('Email (jika ada sistem login)');
            $table->string('password', 255)->nullable()->comment('Password (disimpan dalam bentuk hash)');
            $table->string('nomor_induk', 20)->unique()->comment('NIS untuk siswa, NIP untuk guru/staff');
            $table->string('no_hp', 15)->unique()->comment('Nomor HP');
            $table->enum('jenis_kelamin', ['L', 'P'])->comment('L = Laki-laki, P = Perempuan');
            $table->enum('role', ['admin', 'siswa', 'guru_bk', 'wali_kelas', 'kepala_sekolah'])->comment('Peran pengguna');
            $table->unsignedBigInteger('kelas_id')->nullable()->comment('Hanya diisi untuk siswa dan wali kelas');
            $table->timestamps();

            // Indeks
            $table->index('role');
            $table->index('kelas_id');
            $table->index('nomor_induk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}; 
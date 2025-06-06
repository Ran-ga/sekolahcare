<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->comment('ID siswa yang membuat pengaduan')
                  ->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('judul', 200)->comment('Judul pengaduan');
            $table->text('isi_pengaduan')->comment('Deskripsi pengaduan');
            $table->string('foto_pendukung')->nullable()->comment('Path foto pendukung pengaduan');
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu')->comment('Status pengaduan');
            $table->foreignId('kategori_id')->comment('ID kategori pengaduan')
                  ->constrained('kategori')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            // Indeks
            $table->index('siswa_id');
            $table->index('kategori_id');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}; 
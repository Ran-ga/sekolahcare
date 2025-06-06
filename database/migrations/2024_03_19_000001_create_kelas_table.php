<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Buat tabel kelas
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tingkat');
            $table->string('jurusan');
            $table->integer('kapasitas');
            $table->timestamps();
        });

        // Tambahkan foreign key constraint ke users
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        // Hapus foreign key constraint dari users
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);
        });

        // Hapus tabel kelas
        Schema::dropIfExists('kelas');
    }
}; 
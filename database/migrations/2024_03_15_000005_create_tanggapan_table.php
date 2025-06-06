<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')->constrained('pengaduan')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('tanggapan');
            $table->timestamps();

            // Indeks
            $table->index('pengaduan_id');
            $table->index('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tanggapan');
    }
}; 
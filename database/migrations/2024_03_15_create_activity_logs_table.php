<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('activity_type'); // login, create_report, update_status, delete_report, etc
            $table->string('description');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->json('additional_data')->nullable(); // untuk menyimpan data tambahan seperti ID pengaduan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}; 
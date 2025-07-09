<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
        Schema::create('siswa', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('nisn')->unique();
    $table->enum('jk', ['L', 'P']);
    $table->date('tanggal_lahir');
    $table->text('alamat');
    $table->enum('status', ['belum diverifikasi', 'diterima', 'ditolak'])->default('belum diverifikasi');
    $table->timestamps();
});

    }
};

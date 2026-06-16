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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            // Relasi foreign key ke tabel users bawaan Laravel
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Relasi foreign key ke tabel paket_poto, studio, dan fotografer yang udah kita bikin sebelumnya
            $table->foreignId('paket_id')->constrained('paket_poto')->onDelete('cascade');
            $table->foreignId('studio_id')->constrained('studio')->onDelete('cascade');
            $table->foreignId('fotografer_id')->constrained('fotografer')->onDelete('cascade');

            $table->date('tanggal_reservasi');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->bigInteger('total_harga');
            $table->string('status'); // misal: 'Pending', 'Disetujui', 'Selesai'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};

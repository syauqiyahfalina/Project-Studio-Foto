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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            // Relasi foreign key ke tabel reservasi
            $table->foreignId('reservasi_id')->constrained('reservasi')->onDelete('cascade');

            $table->date('tanggal_bayar');
            $table->bigInteger('jumlah');
            $table->string('metode_pembayaran'); // misal: 'Transfer Bank', 'E-Wallet', 'Tunai'
            $table->string('bukti_bayar')->nullable(); // path file foto bukti transfer
            $table->string('status'); // misal: 'Belum Lunas', 'Lunas'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

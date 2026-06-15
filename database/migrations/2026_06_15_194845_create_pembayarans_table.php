<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            // Membuat foreign key ke tabel reservasis
            $table->foreignId('reservasi_id')->constrained('reservasis')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->integer('jumlah');
            $table->string('metode_pembayaran');
            $table->string('bukti_bayar')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
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
        Schema::create('pendapatan_pakets', function (Blueprint $table) {
            $table->id();
            $table->string('id_paket');
            $table->string('nama_paket');
            $table->bigInteger('harga');
            $table->integer('total_dipesan');
            $table->bigInteger('total_pendapatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendapatan_pakets');
    }
};

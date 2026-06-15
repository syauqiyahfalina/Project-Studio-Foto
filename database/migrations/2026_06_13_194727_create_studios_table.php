<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('nama_studio');
            $table->integer('kapasitas')->nullable(); // Sesuai blade lo
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();       // Sesuai blade lo
            $table->string('status')->default('aktif'); // Penting untuk query controller
            $table->integer('harga_per_jam');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
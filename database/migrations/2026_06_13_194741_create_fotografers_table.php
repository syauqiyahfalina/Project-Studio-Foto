<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fotografers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fotografer');
            $table->string('no_hp');
            $table->string('spesialisasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fotografers');
    }
};
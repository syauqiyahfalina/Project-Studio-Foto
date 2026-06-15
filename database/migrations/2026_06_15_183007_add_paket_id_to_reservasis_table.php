<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Nama class ini WAJIB sama dengan nama file (tapi format CamelCase)
return new class extends Migration 
{
    public function up(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->foreignId('paket_id')->constrained('paket_poto')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropForeign(['paket_id']);
            $table->dropColumn('paket_id');
        });
    }
};
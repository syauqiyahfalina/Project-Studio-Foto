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
        Schema::table('paket_poto', function (Blueprint $table) {
            // Menambahkan kolom foto setelah kolom deskripsi
            $table->string('foto')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_poto', function (Blueprint $table) {
            // Menghapus kolom foto jika rollback dijalankan
            $table->dropColumn('foto');
        });
    }
};
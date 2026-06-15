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
        Schema::table('fotografers', function (Blueprint $table) {
            // Hanya menambahkan kolom foto setelah spesialisasi
            $table->string('foto')->nullable()->after('spesialisasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fotografers', function (Blueprint $table) {
            // Hanya menghapus kolom foto saat rollback
            $table->dropColumn('foto');
        });
    }
};
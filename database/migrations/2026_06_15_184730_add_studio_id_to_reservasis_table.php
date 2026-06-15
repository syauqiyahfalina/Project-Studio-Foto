<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            // Menambahkan kolom studio_id sebagai foreign key
            // Pastikan nama tabel referensinya di database adalah 'studios' atau 'studio'
            $table->foreignId('studio_id')->nullable()->constrained('studios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropForeign(['studio_id']);
            $table->dropColumn('studio_id');
        });
    }
};
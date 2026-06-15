<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kode ini akan mengecek dulu, kalau kolom 'foto' belum ada, baru dibuat
        if (!Schema::hasColumn('galeris', 'foto')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->string('foto')->after('id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('galeris', 'foto')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->dropColumn('foto');
            });
        }
    }
};

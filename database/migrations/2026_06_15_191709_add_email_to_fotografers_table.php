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
        // Menambahkan kolom email setelah nama_fotografer
        $table->string('email')->nullable()->unique()->after('nama_fotografer');
    });
}

public function down(): void
{
    Schema::table('fotografers', function (Blueprint $table) {
        $table->dropColumn('email');
    });
}
};
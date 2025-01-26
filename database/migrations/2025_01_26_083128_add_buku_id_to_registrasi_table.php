<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrasi', function (Blueprint $table) {
            $table->foreignId('buku_id')->constrained('buku')->onDelete('cascade'); // Tambahkan kolom buku_id
        });
    }

    public function down(): void
    {
        Schema::table('registrasi', function (Blueprint $table) {
            $table->dropForeign(['buku_id']);
            $table->dropColumn('buku_id');
        });
    }
};

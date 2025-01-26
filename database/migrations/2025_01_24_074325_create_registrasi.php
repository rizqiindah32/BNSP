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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('Nama', 30);
            $table->string('Email', 30);
            $table->date('Tanggal_lahir', 25);
            $table->string('nomor_telepon', 12);
            $table->unsignedBigInteger('agama_id');
            $table->foreign('agama_id')->references('id')->on('agama')->onDelete('cascade');
            $table->string('alamat',25);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};

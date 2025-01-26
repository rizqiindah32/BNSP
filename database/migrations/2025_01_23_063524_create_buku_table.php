<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penulis_id')->references('id')->on('penulis')->onDelete('cascade');
            $table->string('penulis')->nullable();
            $table->string('judul', 25);
            $table->date('published_at');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};

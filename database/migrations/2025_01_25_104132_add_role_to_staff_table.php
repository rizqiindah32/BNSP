<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToStaffTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('staff', function (Blueprint $table) { // Gunakan 'staff' (singular)
            $table->enum('role', ['staff', 'peminjam'])->default('peminjam')->after('password');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) { // Gunakan 'staff' (singular)
            $table->enum('role', ['staff', 'peminjam'])->default('peminjam')->after('password');
        });

    }
}

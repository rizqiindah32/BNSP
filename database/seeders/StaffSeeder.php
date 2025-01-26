<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'name' => 'Staff Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peminjam 1',
                'email' => 'peminjam@example.com',
                'password' => Hash::make('password123'),
                'role' => 'peminjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

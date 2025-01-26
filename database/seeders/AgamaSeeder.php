<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agama')->insert([
            ['nama' => 'Islam', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kristen', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Katolik', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hindu', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Buddha', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Konghucu', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

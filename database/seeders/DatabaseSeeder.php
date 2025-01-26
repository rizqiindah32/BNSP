<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Registrasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            AgamaSeeder::class,
        ]);

        $this->call([
            StaffSeeder::class,
        ]);

        // Generate data registrasi menggunakan factory
        Registrasi::factory()->count(100)->create();
    }
}

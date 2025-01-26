<?php

namespace Database\Factories;

use App\Models\Agama;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Nama' => $this->faker->name,
            'Email' => substr($this->faker->unique()->safeEmail(), 0, 30),
            'Tanggal_lahir' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            'nomor_telepon' => $this->faker->numerify('08##########'),
            'agama_id' => Agama::inRandomOrder()->first()->id, // Pilih agama secara acak
            'alamat' => $this->faker->text(25),
        ];
    }
}

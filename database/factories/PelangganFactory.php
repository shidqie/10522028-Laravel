<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement([
                'Laki-laki',
                'Perempuan'
            ]),
            'nomor_hp' => fake()->phoneNumber(),
            'alamat_email' => fake()->unique()->safeEmail(),
        ];
    }
}

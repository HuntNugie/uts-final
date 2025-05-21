<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama_dokter" => fake()->name(),
            "spesialis" => fake()->randomElement([
                "Anak","kulit","gizi","organ dalam"
            ]),
            "libur" => fake()->randomElement([
                "Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","minggu"
            ])
        ];
    }
}

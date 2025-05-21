<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nomor_polisi" => fake()->bothify("? #### ???"),
            "tipe" => fake()->randomElement([
                "Toyota agya","BMW RX", "Supra MK","Nissan GTR","Toyota avanza", "Honda Jazz","Mazda Rx8"
            ])
        ];
    }
}

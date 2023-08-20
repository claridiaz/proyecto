<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(5),
            'autor' => fake()->firstName. ' ' .fake()->lastName,
            'editorial' => fake()->company(),
            'anio_publicacion' => fake()->numberBetween(1900, 2023),
            'cantidad_disponible' => fake()-> randomDigit(),

        ];
    }
}

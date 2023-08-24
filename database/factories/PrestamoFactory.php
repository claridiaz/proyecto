<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'fecha_solicitud' => fake()->dateTimeBetween('-2 years', '-1 years')->format('Y-m-d'),
            'fecha_prestamo' => fake()->dateTimeBetween('-10 month', '-8 month')->format('Y-m-d'),
            'fecha_devolucion' => fake()->dateTimeBetween('-9 month', 'now')->format('Y-m-d'),
            'libro_id' => fake()->numberBetween(1, 100),
            'usuario_id' => fake()->numberBetween(1, 100),
        ];
    }
}

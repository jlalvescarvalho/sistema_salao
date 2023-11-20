<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pacote>
 */
class PacoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name,
            'descricao' => fake()->text,
            'valor' => fake()->randomFloat(2, 100, 600),
            'qtd_sessoes' => fake()->numberBetween(3, 12),
            'validade' => fake()->randomElement([30, 60, 90, 120]),
        ];
    }
}

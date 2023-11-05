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
            'descricao'     => fake()->words,
            'valor'         => fake()->randomFloat(2),
            'qtdeSecoes'    => fake()->random_int(1),
            'validade'      => fake()->date_create(),
        ];
    }
}

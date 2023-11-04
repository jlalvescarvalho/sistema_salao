<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rua'       => fake()->words(),
            'numero'    => fake()->random_int(2),
            'bairro'    => fake()->words(),
            'cidade'    => fake()->words(),
            'estado'    => fake()->words(2),
            'cep'       => fake()->postcode(),
        ];
    }
}

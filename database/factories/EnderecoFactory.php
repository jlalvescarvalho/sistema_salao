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
            'rua'       => fake()->words(3, true),
            'numero'    => fake()->randomNumber(5, true),
            'bairro'    => fake()->word(),
            'cidade'    => fake()->word(),
            'estado'    => fake()->randomElement(['SP', 'RJ', 'MG', 'ES', 'PR', 'SC', 'RS', 'MS', 'MT', 'GO', 'DF', 'BA', 'SE', 'AL', 'PE', 'PB', 'RN', 'CE', 'PI', 'MA', 'PA', 'AP', 'RR', 'AM', 'AC', 'RO', 'TO']),
            'cep'       => fake()->postcode(),
        ];
    }
}

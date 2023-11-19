<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servico>
 */
class ServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'          => fake()->name(),
            'descricao'     => fake()->words(3, true),
            'preco_custo'   => fake()->numberBetween(10, 50),
            'preco_venda'   => fake()->numberBetween(10, 50),
        ];
    }
}

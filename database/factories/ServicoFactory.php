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
            'descricao'     => fake()->descricao(),
            'preco_custo'   => fake()->floatval(),
            'preco_venda'   => fake()->floatval(),
        ];
    }
}

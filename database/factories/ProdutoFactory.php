<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codbarras'         => fake()->ean13(),
            'descricao'         => fake()->text(),
            'un'                => fake()->word(2),
            'preco_custo'       => fake()->randomFloat(2),
            'preco_venda'       => fake()->randomFloat(2),
            'estoqueinicial'    => fake()->random_int(2),
        ];
    }
}

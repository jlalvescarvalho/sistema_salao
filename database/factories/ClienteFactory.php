<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'           => fake()->name(),
            'cpf'            => fake()->unique()->cpf(),
            'fone'           => fake()->fone(),
            'dt_nascimento'  => fake()->dt_nascimento(),
            'id_endereco'    => fake()->id_endereco(),
        ];
    }
}

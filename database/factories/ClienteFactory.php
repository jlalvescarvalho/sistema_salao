<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Endereco;
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
            'cpf'            => fake()->cpf(false),
            'telefone'           => fake()->cellphoneNumber(false),
            'data_nascimento'  => fake()->date(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Cliente $cliente) {
            $cliente->endereco()->save(Endereco::factory()->make());
        });
    }
}

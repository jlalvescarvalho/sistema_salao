<?php

namespace Database\Factories;

use App\Enums\StatusContratoPacote;
use App\Models\Pacote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContratoPacote>
 */
class ContratoPacoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataContrato = fake()->date();
        $quantidadeSessoes = fake()->numberBetween(3, 12);
        return [
            'data_contrato' => $dataContrato,
            'data_vencimento' => fake()->dateTimeBetween(
                $dataContrato,
                fake()->randomElement(['+2 month', '+3 month', '+6 month'])
            )->format('Y-m-d'),
            'qtd_sessoes' => $quantidadeSessoes,
            'qtd_sessoes_restantes' => $quantidadeSessoes,
            'status' => fake()->randomElement(StatusContratoPacote::class),
            'id_pacote' => fake()->randomElement(Pacote::all()->pluck('id')->toArray()),
        ];
    }
}

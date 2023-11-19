<?php

namespace Database\Factories;

use App\Enums\StatusAgendamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataHora = fake()->dateTimeInInterval('now', '+5 week');
        $duracao = $this->generateTime();
        $status = fake()->randomElement(StatusAgendamento::class);
        $dataHoraChegada = null;
        $dataHoraFinalizacao = null;
        if ($status == StatusAgendamento::Concluido) {
            $dataHoraChegada = fake()->dateTimeInInterval($dataHora, '+1 hour');
            $dataHoraFinalizacao = fake()->dateTimeInInterval($dataHoraChegada, '+1 hour');
        }

        return [
            'data_hora' => $dataHora,
            'duracao' => $duracao,
            'status' => $status,
            'observacao' => fake()->words(3, true),
            'data_hora_chegada' => $dataHoraChegada,
            'data_hora_finalizacao' => $dataHoraFinalizacao,
        ];
    }

    /**
     * Generate a time between 00:30:00 and 01:30:00
     */
    private function generateTime(): string
    {
        $hour = fake()->numberBetween(0, 1);
        $minute = fake()->numberBetween(0, 30);
        $second = fake()->numberBetween(0, 59);

        return sprintf('%02d:%02d:%02d', $hour, $minute, $second);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\ContratoPacote;
use App\Models\Pacote;
use App\Models\Servico;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $servicos = [
            Servico::create([
                'nome' => 'Limpeza de pele',
                'descricao' => 'Limpeza de pele completa',
                'preco_custo' => '25',
                'preco_venda' => '60',
            ]),
            Servico::create([
                'nome' => 'Massagem',
                'descricao' => 'Massagem relaxante',
                'preco_custo' => '25',
                'preco_venda' => '60',
            ])
        ];

        Pacote::factory()
            ->for(fake()->randomElement($servicos))
            ->count(5)
            ->create();

        for ($i = 0; $i < 25; $i++) {
            Cliente::factory()
                ->has(
                    Agendamento::factory()
                        ->for(fake()->randomElement($servicos))
                        ->count(fake()->numberBetween(0, 8))
                )
                ->hasContratosPacotes(
                    ContratoPacote::factory()
                        ->count(fake()->numberBetween(0, 2))
                )
                ->create();
        }

        $this->call([
            UserSeeder::class,
            ProdutoSeeder::class,
        ]);
    }
}

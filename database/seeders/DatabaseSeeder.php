<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
        for ($i = 0; $i < 25; $i++) {
            Cliente::factory()
                ->has(
                    Agendamento::factory()
                        ->for(fake()->randomElement($servicos))
                        ->count(fake()->numberBetween(0, 8))
                )
                ->create();
        }


        $this->call([
            UserSeeder::class,
            ProdutoSeeder::class,
            PacoteSeeder::class,
        ]);
    }
}

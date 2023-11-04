<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servico::create([
            'nome' => 'Limpeza de pele',
            'descricao' => 'Limpeza de pele completa',
            'preco_custo' => '25',
            'preco_venda' => '60',
        ]);
    }
}

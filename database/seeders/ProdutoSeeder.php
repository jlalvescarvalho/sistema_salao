<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            'codbarra' => '7891234561234',
            'descricao' => 'Produto teste',
            'un' => 'UN',
            'preco_custo' => '60',
            'preco_venda' => '90',
            'estoqueinicial' => '100',
        ]);
    }
}

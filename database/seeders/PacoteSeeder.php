<?php

namespace Database\Seeders;

use App\Models\Pacote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pacote::create([
            'nome' => 'teste',
            'descricao' => 'pacote master',
            'valor' => '100',
            'qtd_sessoes' => '5',
            'validade' => '90',
            'id_servico' => 1,
        ]);
    }
}

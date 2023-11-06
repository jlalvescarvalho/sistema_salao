<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'joao lucas',
            'telefone' => '87981753993',
            'cpf' => '12312313345',
            'data_nascimento' => '1992-11-15',
            'id_endereco' => 1,
        ]);
    }
}

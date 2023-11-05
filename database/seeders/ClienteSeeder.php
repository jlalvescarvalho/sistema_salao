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
            'telefone' => '87 981753993',
            'cpf' => '123.123.133-45',
            'data_nascimento' => '15/11/1992',
            'id_endereco' => 1,
        ]);
    }
}

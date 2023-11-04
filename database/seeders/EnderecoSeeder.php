<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Endereco::create([
            'rua'       => 'Rua teste',
            'numero'    => '52',
            'bairro'    => 'Bairro teste',
            'cidade'    => 'Cidade teste',
            'estado'    => 'PE',
            'cep'       => '55295-050',
        ]);
    }
}

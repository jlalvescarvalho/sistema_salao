<?php

namespace Database\Seeders;

use App\Models\Agendamento;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::factory(25)
            ->has(Agendamento::factory()->count(fake()->numberBetween(0, 8)))
            ->create();
    }
}

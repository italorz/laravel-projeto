<?php

namespace Database\Seeders;

use App\Models\Montadora;
use Illuminate\Database\Seeder;

class MontadoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $montadoras = ['Volkswagen', 'Ford', 'Fiat', 'Chevrolet'];

        foreach ($montadoras as $nome) {
            Montadora::create(['nome' => $nome]);
        }
    }
}

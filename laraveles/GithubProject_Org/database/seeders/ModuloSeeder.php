<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modulo;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = [
            ['nombre' => 'Desarrollo Web en Entorno Servidor', 'abreviatura' => 'DWES', 'horas' => '7', 'creditos' => '12'],
            ['nombre' => 'Optativa', 'abreviatura' => 'OPT', 'horas' => '3', 'creditos' => '2']
        ];

        foreach($modulos as $modulo) {
            Modulo::create($modulo);
        }
    }
}

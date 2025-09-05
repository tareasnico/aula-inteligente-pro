<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula; // Importa el modelo

class AulaSeeder extends Seeder
{
    public function run(): void
    {
       // Código nuevo y mejorado
Aula::updateOrCreate(
    ['nombre' => 'Aula 101'],
    ['ubicacion' => 'Piso 1, Ala Norte', 'capacidad' => 30]
);
Aula::updateOrCreate(
    ['nombre' => 'Laboratorio de Química'],
    ['ubicacion' => 'Piso 2, Edificio B', 'capacidad' => 25]
);
Aula::updateOrCreate(
    ['nombre' => 'Salón de Actos'],
    ['ubicacion' => 'Planta Baja', 'capacidad' => 150]
);
    }
}
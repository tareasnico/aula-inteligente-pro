<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AulaSeeder::class,
            // Aquí puedes añadir otros seeders que crees
        ]);
    }
} 
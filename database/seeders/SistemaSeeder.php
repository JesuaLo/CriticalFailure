<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sistema;
use Illuminate\Database\Seeder;

class SistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sistemas = [
            [
                'nombre' => 'Dungeons & Dragons 5th Edition',
                'slug' => 'dnd-5e',
                'imagen_url' => 'logos/dnd5e.png',
            ],
            [
                'nombre' => 'La llamada de Cthulhu 7ma Edición',
                'slug' => 'cthulhu-7e',
                'imagen_url' => 'logos/cthulhu7e.png',
            ],
            [
                'nombre' => 'Mundo de Tinieblas',
                'slug' => 'mundo-tinieblas',
                'imagen_url' => 'logos/mundotinieblas.png',
            ],
        ];
        foreach ($sistemas as $sistema) {
            Sistema::updateOrCreate(
                ['slug' => $sistema['slug']],
                $sistema
            );
        }
    }
}

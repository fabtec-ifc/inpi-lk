<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = [
            ['nome' => 'Instituto Federal Catarinense - Reitoria', 'sigla' => 'IFC-REITORIA', 'cidade' => 'Blumenau'],
            ['nome' => 'Instituto Federal Catarinense - Campus Araquari', 'sigla' => 'IFC-ARAQUARI', 'cidade' => 'Araquari'],
            ['nome' => 'Instituto Federal Catarinense - Campus Blumenau', 'sigla' => 'IFC-BLU', 'cidade' => 'Blumenau'],
            ['nome' => 'Instituto Federal Catarinense - Campus Camboriú', 'sigla' => 'IFC-CAM', 'cidade' => 'Camboriú'],
            ['nome' => 'Instituto Federal Catarinense - Campus Concórdia', 'sigla' => 'IFC-CON', 'cidade' => 'Concórdia'],
            ['nome' => 'Instituto Federal Catarinense - Campus Rio do Sul', 'sigla' => 'IFC-RSL', 'cidade' => 'Rio do Sul'],
            ['nome' => 'Instituto Federal Catarinense - Campus Videira', 'sigla' => 'IFC-VID', 'cidade' => 'Videira'],
        ];

        foreach ($unidades as $unidade) {
            Unidade::firstOrCreate(
                ['sigla' => $unidade['sigla']],
                $unidade
            );
        }
    }
}

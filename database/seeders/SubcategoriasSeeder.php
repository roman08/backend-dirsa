<?php

namespace Database\Seeders;
use App\Models\Subcategoria;

use Illuminate\Database\Seeder;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            ['nombre' => 'DIRECCION', 'estatus' => 'Activo'],
            ['nombre' => 'FINANZAS', 'estatus' => 'Activo'],
            ['nombre' => 'CAPITAL HUMANO', 'estatus' => 'Activo'],
            ['nombre' => 'SISTEMAS', 'estatus' => 'Activo'],
            ['nombre' => 'ANALISIS DE INFORMACION', 'estatus' => 'Activo'],
            ['nombre' => 'COORDINADOR DESARROLLO ORGANIZACIONAL', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR', 'estatus' => 'Activo'],
            ['nombre' => 'OPERATIVO', 'estatus' => 'Activo'],
            ['nombre' => 'AGENTE CALIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'LIDER', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR BILINGÜE', 'estatus' => 'Activo'],
            ['nombre' => 'CAPA', 'estatus' => 'Activo'],
            ['nombre' => 'GERENTE', 'estatus' => 'Activo'],
            ['nombre' => 'PROCESOS', 'estatus' => 'Activo'],
            ['nombre' => 'SUBGERENTE', 'estatus' => 'Activo'],
            ['nombre' => 'VENTAS', 'estatus' => 'Activo']
        ];

        Subcategoria::insert($data);
        
    }
}

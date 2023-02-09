<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $data = [
            ['nombre' => 'AGENTE CALIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'ANALISIS DE INFORMACION', 'estatus' => 'Activo'],
            ['nombre' => 'CAPITAL HUMANO', 'estatus' => 'Activo'],
            ['nombre' => 'COORDINADOR DESARROLLO ORGANIZACIONAL', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR BILINGÜE', 'estatus' => 'Activo'],
            ['nombre' => 'CAPA', 'estatus' => 'Activo'],
            ['nombre' => 'DIRECCION', 'estatus' => 'Activo'],
            ['nombre' => 'FINANZAS', 'estatus' => 'Activo'],
            ['nombre' => 'GERENTE', 'estatus' => 'Activo'],
            ['nombre' => 'LIDER', 'estatus' => 'Activo'],
            ['nombre' => 'SISTEMAS', 'estatus' => 'Activo'],
            ['nombre' => 'OPERATIVO', 'estatus' => 'Activo'],
            ['nombre' => 'PROCESOS', 'estatus' => 'Activo'],
            ['nombre' => 'SUBGERENTE', 'estatus' => 'Activo'],
            ['nombre' => 'VENTAS', 'estatus' => 'Activo'],
            ['nombre' => 'SIN DATOS', 'estatus' => 'Activo']
        ];

        Departamento::insert($data);
        

    }
}

<?php

namespace Database\Seeders;
use App\Models\Empresas;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $data = [
            ['nombre' => 'E FARMA', 'estatus' => 'Activo'],
            ['nombre' => 'TECHNOLOGY', 'estatus' => 'Activo'],
            ['nombre' => 'EXCELLENCE', 'estatus' => 'Activo'],
            ['nombre' => 'DO IT RIGHT', 'estatus' => 'Activo'],
            ['nombre' => 'CLICKANDBUY', 'estatus' => 'Activo'],
            ['nombre' => 'BREGO', 'estatus' => 'Activo'],
            ['nombre' => 'MHR', 'estatus' => 'Activo'],
            ['nombre' => 'MODALIDAD 40', 'estatus' => 'Activo'],
            ['nombre' => 'Sin datos', 'estatus' => 'Activo'],
        ];

        Empresas::insert($data);
        

    }
}

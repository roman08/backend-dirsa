<?php

namespace Database\Seeders;
use App\Models\Ubicacion;

use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'SITE', 'estatus' => 'Activo'],
            ['nombre' => 'HO', 'estatus' => 'Activo'],
            ['nombre' => 'HO2', 'estatus' => 'Activo'],
            ['nombre' => 'CAMPO', 'estatus' => 'Activo'],
            ['nombre' => 'BAJA', 'estatus' => 'Activo'],
        ];

        Ubicacion::insert($data);
        
    }
}

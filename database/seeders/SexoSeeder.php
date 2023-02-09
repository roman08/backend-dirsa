<?php

namespace Database\Seeders;
use App\Models\Sexo;

use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            ['nombre' => 'Masculino', 'estatus' => 'Activo'],
            ['nombre' => 'Femenino', 'estatus' => 'Activo'],
            ['nombre' => 'Indefinido', 'estatus' => 'Activo']
        ];

        Sexo::insert($data);
    }
}

<?php

namespace Database\Seeders;
use App\Models\Turno;

use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'FULL TIME', 'estatus' => 'Activo'],
            ['nombre' => 'MATUTINO', 'estatus' => 'Activo'],
            ['nombre' => 'VESPERTINO', 'estatus' => 'Activo'],
            ['nombre' => 'SIN TURNO', 'estatus' => 'Activo'],
        ];

        Turno::insert($data);
        
    }
}

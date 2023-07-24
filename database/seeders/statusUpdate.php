<?php

namespace Database\Seeders;

use App\Models\Estatus;

use Illuminate\Database\Seeder;

class statusUpdate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'Completo', 'estatus' => 'Activo'],
            ['nombre' => 'Pendiente', 'estatus' => 'Activo'],
            ['nombre' => 'Cancelado', 'estatus' => 'Activo'],

        ];

        Estatus::insert($data);
    }
}

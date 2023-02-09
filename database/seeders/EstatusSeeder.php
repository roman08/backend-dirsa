<?php

namespace Database\Seeders;
use App\Models\Estatus;
use Illuminate\Database\Seeder;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'ACTIVO', 'estatus' => 'Activo'],
            ['nombre' => 'BAJA', 'estatus' => 'Activo'],
            ['nombre' => 'STAND BY', 'estatus' => 'Activo'],

        ];

        Estatus::insert($data);
    }
}

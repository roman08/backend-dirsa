<?php

namespace Database\Seeders;
use App\Models\Banco;

use Illuminate\Database\Seeder;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['nombre' => 'SIN DATO', 'estatus' => 'Activo'],
            ['nombre' => 'BANORTE', 'estatus' => 'Activo'],
            ['nombre' => 'BBVA BANCOMER', 'estatus' => 'Activo'],
            ['nombre' => 'BANCOPPEL', 'estatus' => 'Activo'],
            ['nombre' => 'BANAMEX', 'estatus' => 'Activo'],
            ['nombre' => 'HSBC', 'estatus' => 'Activo'],
            ['nombre' => 'STP', 'estatus' => 'Activo'],
            ['nombre' => 'BANCO AZTECA', 'estatus' => 'Activo'],
            ['nombre' => 'SCOTIABANK', 'estatus' => 'Activo'],
            ['nombre' => 'INBURSA', 'estatus' => 'Activo'],
            ['nombre' => 'HEY BANCO', 'estatus' => 'Activo'],
            ['nombre' => 'BAJIO', 'estatus' => 'Activo'],
            ['nombre' => 'MULTIVA', 'estatus' => 'Activo'],
            ['nombre' => 'CITIBANAMEX', 'estatus' => 'Activo'],
            ['nombre' => 'BANREGIO', 'estatus' => 'Activo'],
            ['nombre' => 'EFECTIVO', 'estatus' => 'Activo'],
            ['nombre' => 'SANTANDER', 'estatus' => 'Activo'],
            ['nombre' => 'SCOTIANBANK', 'estatus' => 'Activo'],
            ['nombre' => 'SIN PAGO', 'estatus' => 'Activo'],
            ['nombre' => 'AFIRME', 'estatus' => 'Activo'],
            ['nombre' => 'INTERCAM BANCO', 'estatus' => 'Activo'],
            ['nombre' => 'ACTINVER', 'estatus' => 'Activo'],
            ['nombre' => 'PENDIENTE', 'estatus' => 'Activo'],
        ];

        Banco::insert($data);
        
        

    }
}

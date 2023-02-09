<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EjecucionAdministrativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ejecucion_administrativas')->insert([
            'nombre' => 'ESTRUCTURA',
            'estatus' => 'Activo'
        ]);
        DB::table('ejecucion_administrativas')->insert([
            'nombre' => 'OPERACION',
            'estatus' => 'Activo'
        ]);
    }
}

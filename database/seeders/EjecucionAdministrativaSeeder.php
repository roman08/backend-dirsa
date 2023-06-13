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
        DB::table('company_structure_type')->insert([
            'nombre' => 'ESTRUCTURA',
            'estatus' => 'Activo'
        ]);
        DB::table('company_structure_type')->insert([
            'nombre' => 'OPERACION',
            'estatus' => 'Activo'
        ]);
    }
}

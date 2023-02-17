<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'nombre' => 'Usuario - supervisor',
            'usuario' => 'supervisor',
            'email' => 'supervisor@google.com',
            'password' => Hash::make('admin123'),
            'id_tipo_usuario' => 3,
            'apellido_pat' => 'supervisor',
            'apellido_mat' => 'supervisor',
            'id_ubicacion' => 1,
            'id_empresa_rh' => 1,
            'nombre_completo' => 'Usuario - supervisor',
            'numero_empleado' => 1,
            'id_puesto' => 1,
            'id_estatus' => 1
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\typeModule;

class TypeModuelSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Modulo', 'status' => 'Activo'],
            ['name' => 'Catalogo', 'status' => 'Activo'],
        ];

        typeModule::insert($data);
    }
}

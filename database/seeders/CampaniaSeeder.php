<?php

namespace Database\Seeders;
use App\Models\Campania;
use Illuminate\Database\Seeder;

class CampaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nombre' => 'Laravel',
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'PHP',
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'Python',
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'Java',
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'C',
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'C++',
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'Ruby',
                'estatus' => 'Activo'
            ],
        ];
        Campania::insert($data);
    }
}

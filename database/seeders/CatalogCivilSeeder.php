<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CatalogCivilStatus;

class CatalogCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'Soltero(a)', 'id_estatus' => 1],
            ['nombre' => 'Casado(a)', 'id_estatus' => 1],
            ['nombre' => 'Divorciado(a)', 'id_estatus' => 1],
            ['nombre' => 'Separado(a)', 'id_estatus' => 1],
            ['nombre' => 'Unión libre(AB+)', 'id_estatus' => 1],
            ['nombre' => 'Viudo(a)', 'id_estatus' => 1]
        ];

        CatalogCivilStatus::insert($data);
    }
}

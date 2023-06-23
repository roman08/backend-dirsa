<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CatalogCauseBlackList;
class CauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Acoso sexual', 'id_status' => 1],
            ['name' => 'Certificación', 'id_status' => 1],
            ['name' => 'Cliente', 'id_status' => 1],
            ['name' => 'Equipo de cómputo', 'id_status' => 1],
            ['name' => 'Estado de ebriedad', 'id_status' => 1],
            ['name' => 'Falsificación de documentos', 'id_status' => 1],
            ['name' => 'Idioma', 'id_status' => 1],
            ['name' => 'Insoburdinacion', 'id_status' => 1],
            ['name' => 'Mala actitud', 'id_status' => 1],
            ['name' => 'Malas prácticas', 'id_status' => 1],
            ['name' => 'Manejo de cómputo', 'id_status' => 1],
            ['name' => 'No sigue instrucciones', 'id_status' => 1],
            ['name' => 'Pendiente', 'id_status' => 1],
            ['name' => 'Pluriempleo', 'id_status' => 1],
            ['name' => 'Productivadd', 'id_status' => 1]
        ];

        CatalogCauseBlackList::insert($data);
    }
}

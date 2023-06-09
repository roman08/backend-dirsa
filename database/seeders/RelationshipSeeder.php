<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Relationship;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'Padre o madre', 'id_estatus' => 1],
            ['nombre' => 'Hijo(a)', 'id_estatus' => 1],
            ['nombre' => 'Abuelo(a)', 'id_estatus' => 1],
            ['nombre' => 'Hermano(a)', 'id_estatus' => 1],
            ['nombre' => 'Amigo(a)', 'id_estatus' => 1]
        ];

        Relationship::insert($data);
    }
}

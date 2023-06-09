<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeBlood;

class TypeBloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'A positivo (A +)', 'id_estatus' => 1],
            ['nombre' => 'A negativo (A-)', 'id_estatus' => 1],
            ['nombre' => 'B positivo (B +)', 'id_estatus' => 1],
            ['nombre' => 'B negativo (B-)', 'id_estatus' => 1],
            ['nombre' => 'AB positivo (AB+)', 'id_estatus' => 1],
            ['nombre' => 'AB negativo (AB-)', 'id_estatus' => 1],
            ['nombre' => 'O positivo (O+)	', 'id_estatus' => 1],
            ['nombre' => 'O negativo (O-)	', 'id_estatus' => 1]
        ];

        TypeBlood::insert($data);
    }
}

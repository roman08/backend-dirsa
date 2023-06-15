<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\catModue;

class modulesAddSeeder extends Seeder
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
                "id_type" => 1,
                "name" => "INICIO",
                "order" => 1,
                "status" => "1",


            ],
            [
                "id_type" => 1,
                "name" => "Dashboard",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 1,
                "name" => "CATÁLOGOS",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 1,
                "name" => "MÓDULOS",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 1,
                "name" => "FINANZAS",
                "order" => 1,
                "status" => "1",

            ],
           

        ];

        catModue::insert($data);
    }
}

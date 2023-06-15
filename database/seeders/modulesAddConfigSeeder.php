<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\catModue;

class modulesAddConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [

            [
                "id_type" => 1,
                "name" => "CONFIGURACIÓN",
                "order" => 1,
                "status" => "1",


            ]


        ];

        catModue::insert($data);
    }
}

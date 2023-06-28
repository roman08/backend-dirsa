<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\catModue;

class ModuleBlackListSeeder extends Seeder
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
                "name" => "Lista negra",
                "order" => 1,
                "status" => "1",


            ]


        ];

        catModue::insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CatTypeOrigin;

class TypeOriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'COX', 'status' => 'Activo'],
            ['name' => 'TALA', 'status' => 'Activo'],

        ];

        CatTypeOrigin::insert($data);
    }
}

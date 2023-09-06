<?php

namespace Database\Seeders;
use App\Models\categories_clarifications;
use Illuminate\Database\Seeder;

class categoriesClarifitactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Enfermedad', 'status' => 1],
            ['name' => 'Escolar', 'status' => 1],
            ['name' => 'Incapacidad', 'status' => 1],
            ['name' => 'Personal', 'status' => 1],
            ['name' => 'Otro', 'status' => 1]
        ];

        categories_clarifications::insert($data);
    }
}

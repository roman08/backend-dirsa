<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\recruitmenIndustries;

class RecruitmentIndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Aeroespacial/Aerodinámica', 'status' => 1],
            ['name' => 'Automotriz', 'status' => 1],
            ['name' => 'Farmacéutico', 'status' => 1],
            ['name' => 'Construcción', 'status' => 1],
            ['name' => 'Hospitalidad', 'status' => 1],
            ['name' => 'Educación', 'status' => 1],
            ['name' => 'Financiero', 'status' => 1],
            ['name' => 'Gobierno', 'status' => 1],
            ['name' => 'Generación de energía', 'status' => 1],
            ['name' => 'Industria', 'status' => 1],
            ['name' => 'Retail', 'status' => 1],
            ['name' => 'Salud', 'status' => 1],
            ['name' => 'Telecomunicaciones', 'status' => 1],
            ['name' => 'Tecnologías de la información', 'status' => 1],
            ['name' => 'Otro', 'status' => 1],
            
        ];

        recruitmenIndustries::insert($data);
    }
}

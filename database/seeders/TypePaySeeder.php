<?php

namespace Database\Seeders;
use App\Models\TypePay;

use Illuminate\Database\Seeder;

class TypePaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //type_pays
         $data = [
            ['name' => 'Pago fijo mensual', 'status' => 'Activo'],
            ['name' => 'Pago en base a hora', 'status' => 'Activo'],

        ];

        TypePay::insert($data);
    }
}

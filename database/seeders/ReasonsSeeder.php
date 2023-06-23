<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CatalogReasonBlackList;
class ReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Demanda', 'status' => 1],
            ['name' => 'Rescisión de contrato', 'status' => 1],
            ['name' => 'Término de contrato', 'status' => 1]
        ];

        CatalogReasonBlackList::insert($data);
    }
}

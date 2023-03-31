<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\catModue;

class ModulesSeeder extends Seeder
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
                "name" => "Inventeario",
                "order" => 1,
                "status" => "1",


            ],
            [
                "id_type" => 1,
                "name" => "Almacen",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 1,
                "name" => "Requisiciones",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 1,
                "name" => "Ordenes de compra",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 2,
                "name" => "Empleados",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 2,
                "name" => "Clientes",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 2,
                "name" => "Proveedores",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 2,
                "name" => "Productos",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 2,
                "name" => "Tipo de cambio",
                "order" => 1,
                "status" => "1",

            ],
            [
                "id_type" => 1,
                "name" => "Usuarios",
                "order" => 1,
                "status" => "1",

            ]

        ];



        catModue::insert($data);
    }
}

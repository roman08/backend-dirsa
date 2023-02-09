<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserSeeder::class,
            // PuestosSeeder::class,
            // SexoSeeder::class,
            // EmpresasSeeder::class,
            // BancosSeeder::class,
            // EstatusSeeder::class,
            // SubcategoriasSeeder::class,
            // UbicacionSeeder::class,
            // TurnoSeeder::class,
            // EjecucionAdministrativaSeeder::class,
            // DepartamentosSeeder::class,
            // TipoUsuarioSeeder::class,
            TypePaySeeder::class

        ]);
        // \App\Models\User::factory(10)->create();
    }
}

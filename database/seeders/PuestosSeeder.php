<?php

namespace Database\Seeders;
use App\Models\Puesto;
use Illuminate\Database\Seeder;

class PuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'AGENTE', 'estatus' => 'Activo'],
            ['nombre' => 'AGENTE BILINGÜE', 'estatus' => 'Activo'],
            ['nombre' => 'AGENTE CALIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'AGENTE DE SEGURIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'ANALISTA DE INFORMACION', 'estatus' => 'Activo'],
            ['nombre' => 'ANALISTA DE INFORMACION INFRAESTRUCTURA', 'estatus' => 'Activo'],
            ['nombre' => 'ANALISTA DE INFORMACION NOC', 'estatus' => 'Activo'],
            ['nombre' => 'ANALISTA DE INFORMACION REDES', 'estatus' => 'Activo'],
            ['nombre' => 'ASISTENTE DE DIRECCION Y RECEPCION', 'estatus' => 'Activo'],
            ['nombre' => 'ASISTENTE PERSONAL', 'estatus' => 'Activo'],
            ['nombre' => 'AUX DE COMUNICACIÓN ', 'estatus' => 'Activo'],
            ['nombre' => 'AUXILIAR ADMINISTRATIVO', 'estatus' => 'Activo'],
            ['nombre' => 'AUXILIAR ADMINISTRATIVO CONTABLE', 'estatus' => 'Activo'],
            ['nombre' => 'AUXILIAR DE LIMPIEZA', 'estatus' => 'Activo'],
            ['nombre' => 'AUXILIAR TI', 'estatus' => 'Activo'],
            ['nombre' => 'BASE DE DATOS', 'estatus' => 'Activo'],
            ['nombre' => 'CALIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'CALIDAD BILINGÜE', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITACION', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR BILINGÜE', 'estatus' => 'Activo'],
            ['nombre' => 'CAPACITADOR FLEX', 'estatus' => 'Activo'],
            ['nombre' => 'CAPTURISTA', 'estatus' => 'Activo'],
            ['nombre' => 'CHOFER', 'estatus' => 'Activo'],
            ['nombre' => 'CLICKER', 'estatus' => 'Activo'],
            ['nombre' => 'CONTADOR', 'estatus' => 'Activo'],
            ['nombre' => 'COORDINADOR', 'estatus' => 'Activo'],
            ['nombre' => 'COORDINADOR DE COMUNICACIÓN ', 'estatus' => 'Activo'],
            ['nombre' => 'COORDINADOR DE PROCESOS', 'estatus' => 'Activo'],
            ['nombre' => 'COORDINADOR DESARROLLO ORGANIZACIONAL', 'estatus' => 'Activo'],
            ['nombre' => 'DIRECTOR ADJUNTO', 'estatus' => 'Activo'],
            ['nombre' => 'DIRECTORA GENERAL', 'estatus' => 'Activo'],
            ['nombre' => 'DISEÑADOR GRAFICO', 'estatus' => 'Activo'],
            ['nombre' => 'GERENTE', 'estatus' => 'Activo'],
            ['nombre' => 'GERENTE DE CALIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'GERENTE DE SISTEMAS', 'estatus' => 'Activo'],
            ['nombre' => 'LIDER', 'estatus' => 'Activo'],
            ['nombre' => 'LIDER FLEX', 'estatus' => 'Activo'],
            ['nombre' => 'LIDER IB', 'estatus' => 'Activo'],
            ['nombre' => 'LIDER OB', 'estatus' => 'Activo'],
            ['nombre' => 'MANTENIMIENTO GENERAL', 'estatus' => 'Activo'],
            ['nombre' => 'MIS', 'estatus' => 'Activo'],
            ['nombre' => 'MONITORISTA', 'estatus' => 'Activo'],
            ['nombre' => 'PUNTO DE CONTACTO', 'estatus' => 'Activo'],
            ['nombre' => 'RECEPCIONISTA', 'estatus' => 'Activo'],
            ['nombre' => 'RECLUTADOR', 'estatus' => 'Activo'],
            ['nombre' => 'RECLUTADOR BILINGÜE', 'estatus' => 'Activo'],
            ['nombre' => 'RECLUTADOR DE CAMPO', 'estatus' => 'Activo'],
            ['nombre' => 'REDES SOCIALES', 'estatus' => 'Activo'],
            ['nombre' => 'REDPACKER', 'estatus' => 'Activo'],
            ['nombre' => 'SEGURIDAD', 'estatus' => 'Activo'],
            ['nombre' => 'SERVICIOS GENERALES', 'estatus' => 'Activo'],
            ['nombre' => 'SISTEMAS', 'estatus' => 'Activo'],
            ['nombre' => 'SOPORTE', 'estatus' => 'Activo'],
            ['nombre' => 'SOPORTE TECNICO', 'estatus' => 'Activo'],
            ['nombre' => 'SUBGERENTE', 'estatus' => 'Activo'],
            ['nombre' => 'SUPERVISOR DE BANCO FORGADORES', 'estatus' => 'Activo'],
            ['nombre' => 'TRAFFICKER DIGETAL', 'estatus' => 'Activo'],
            ['nombre' => 'TRAINER', 'estatus' => 'Activo'],
            ['nombre' => 'VIGILANTE', 'estatus' => 'Activo'],
            ['nombre' => 'VISITADOR', 'estatus' => 'Activo'],
            ['nombre' => 'SIN DATOS', 'estatus' => 'Activo'],
        ];

        Puesto::insert($data);
    }
}

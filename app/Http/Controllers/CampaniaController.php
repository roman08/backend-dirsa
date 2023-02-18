<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campania;
use App\Models\CampaniaGrupoAgentes;
use App\Models\CampaniaSupervisor;
use App\Models\CampaniaConfiguracionPorMes;

use Illuminate\Support\Facades\DB;

class CampaniaController extends Controller
{
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:50',
            'fecha_creacion' => '',
            'bilingue' => '',
            'id_forma_de_pago' => '',
            'id_supervisor' => '',
            'id_grupo' => ''

        ]);

        $validatedData['estatus'] = 'Activo';

        $campania = Campania::create([
            'nombre' => $validatedData['nombre'],
            'estatus' => 'Activo',
            'fecha_creacion' => $validatedData['fecha_creacion'],
            'bilingue' => $validatedData['bilingue'],
            'id_forma_de_pago' => $validatedData['id_forma_de_pago'],

        ]);


        CampaniaSupervisor::create([
            'id_campania' => $campania->id,
            'id_supervisor' => $validatedData['id_supervisor'],
        ]);

        CampaniaGrupoAgentes::create([
            'id_campania' => $campania->id,
            'id_grupo' => $validatedData['id_grupo'],
        ]);






        return response()->json([
            'status' => 'success',
            'message' => 'Campaña creada correctamente',
        ], 200);
    }


    public function get()
    {
        $campanias = Campania::with('groups')->with('leaders')->with('typePay')->with('months')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Get campañas',
            'data' => $campanias
        ], 200);
    }

    public function addMonth(Request $request)
    {
        $validatedData = $request->validate([
            'id_campania' => 'required',
            'anio' => '',
            'id_mes' => '',
            'dias_habiles' => '',
            'numero_agentes' => '',
            'hrs_jornada' => '',
            'precio_hr' => '',
            'tipo_moneda' => '',
            'total_horas' => '',
            'total_costo' => '',
            'monto_fijo_mensual' => '',
        ]);


        $campania = CampaniaConfiguracionPorMes::create([
            'id_campania' => $validatedData['id_campania'],
            'anio' => $validatedData['anio'],
            'id_mes' => $validatedData['id_mes'],
            'dias_habiles' => $validatedData['dias_habiles'],
            'numero_agentes' => $validatedData['numero_agentes'],
            'hrs_jornada' => $validatedData['hrs_jornada'],
            'precio_hr' => $validatedData['precio_hr'],
            'tipo_moneda' => $validatedData['tipo_moneda'],
            'total_horas' => $validatedData['total_horas'],
            'total_costo' => $validatedData['total_costo'],
            'monto_fijo_mensual' => $validatedData['monto_fijo_mensual'],
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'Mes agregado correctamente',
        ], 200);
    }

    public function getCampaaniasAdmin()
    {
        $campanias = Campania::with('groups.agentes')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Datos botenidos correctamente',
            'data' => $campanias
        ], 200);
    }
}

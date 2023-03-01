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
            'id_grupo' => '',
            'id_type_origin' => '',
            

        ]);

        $validatedData['estatus'] = 'Activo';

        $campania = Campania::create([
            'nombre' => $validatedData['nombre'],
            'estatus' => 'Activo',
            'fecha_creacion' => $validatedData['fecha_creacion'],
            'bilingue' => $validatedData['bilingue'],
            'id_forma_de_pago' => $validatedData['id_forma_de_pago'],
            'id_type_origin' => $validatedData['id_type_origin'],
            

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
        $campanias = Campania::with('groups')->with('leaders')->with('typePay')->with('months')->where('estatus', '=', 'Activo')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Get campañas',
            'data' => $campanias
        ], 200);
    }


    public function getById(Request $request)
    {
        $id = $request->get('id');
        $campanias = Campania::with('groups')->with('leaders')->with('typePay')->with('months')->where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Datos campaña',
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

    public function delete(Request $request){

        $id = $request->get('id');
        try {
            $campania = Campania::find($id);

            $campania->estatus = 'Inactivo';
            $campania->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Campaña eliminada correctamente.',
                'data' => $campania
            ], 200);
        } catch (\Throwable $th) {
            $error_code = $th->errorInfo[1];
            return response()->json([
                'status' => 'error',
                'msg' => 'Error al eliminar la campaña, intetelo nuevamente.',
                'data' => $error_code
            ]);
        }
 
    }

    public function update( Request $request){

        $id = $request['id'];
        $campania = Campania::find($id);

       
        $campania->bilingue = $request['bilingue'];
        $campania->fecha_creacion = $request['fecha_creacion'];
        $campania->nombre =  $request['nombre'];
        $campania->id_forma_de_pago = $request['id_forma_de_pago'];


        $campania->save();

       
        $cs = CampaniaSupervisor::where('id_campania', $id)->delete();
        
        

        CampaniaSupervisor::create([
            'id_campania' => $campania->id,
            'id_supervisor' => $request['id_supervisor'],
        ]);

        $ca = CampaniaGrupoAgentes::where('id_campania', $id)->delete();
        
        CampaniaGrupoAgentes::create([
            'id_campania' => $campania->id,
            'id_grupo' => $request['id_grupo'],
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'Campaña actualizada correctamente.',
            'data' => $request['id']
        ], 200); 
    }


    public function getCampaniaAgent( Request $request){

        $id_usuario_registro = $request->get('id_usuario_registro');
        $id_type_origin = $request->get('id_type_origin');
        $id_campania = $request->get('id_campania');
        $firstDay = $request->get('firstDay');
        $lastDay = $request->get('lastDay');
        $mountActuality = $request->get('mountActuality');

        $data = DB::table('agent_hours')
        ->select('agent_hours.day_register as fecha', DB::raw("count('agent_hours.created_at') as total"), DB::raw("TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(agent_hours.tiempo_conexion_agente))), '%H:%i:%s') as tiempo_total"))
        ->where('agent_hours.tipo_fuente', '=', $id_type_origin)
        ->where('agent_hours.id_usuario_registro', '=', $id_usuario_registro)
        ->where('agent_hours.id_campania', '=', $id_campania)
        ->whereBetween('day_register', [$firstDay, $lastDay])
        ->groupBy('agent_hours.day_register')
        ->get();

        $datos_configuracion = DB::table('campania_configuracion_por_mes')
        ->select('*')
        ->where('id_campania', '=', $id_campania)
        ->where('id_mes', '=',$mountActuality)
        ->get()[0];


        $respuesta = [
            'respuesta' => $datos_configuracion,
            'data' => $data,
            'id_type_origin' => $id_type_origin
        ];

        return response()->json([
            'status' => 'success',
            'message' => 'Campaña actualizada correctamente.',
            'data' => $respuesta
        ], 200); 
    }


    public function get_hours_admin(){

        $respuesta = DB::select('CALL get_hours_admin()');


        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $respuesta
        ], 200); 
    }
}

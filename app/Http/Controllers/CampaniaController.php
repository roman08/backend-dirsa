<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campania;
use App\Models\CampaniaGrupoAgentes;
use App\Models\CampaniaSupervisor;
use App\Models\CampaniaConfiguracionPorMes;
use App\Models\AgentHours;
use Illuminate\Support\Facades\DB;
use Carbon\CarbonInterval;
use Carbon\Carbon;

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
            'data' => $campania->id
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

    public function delete(Request $request)
    {

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

    public function update(Request $request)
    {

        $id = $request['id'];
        $campania = Campania::find($id);


        $campania->bilingue = $request['bilingue'];
        $campania->fecha_creacion = $request['fecha_creacion'];
        $campania->nombre =  $request['nombre'];
        $campania->id_forma_de_pago = $request['id_forma_de_pago'];
        $campania->id_type_origin = $request['id_type_origin'];
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


    public function getCampaniaAgent(Request $request)
    {

        $id_usuario_registro = $request->get('id_usuario_registro');
        $id_type_origin = $request->get('id_type_origin');
        $id_campania = $request->get('id_campania');
        $firstDay = $request->get('firstDay');
        $lastDay = $request->get('lastDay');
        $mountActuality = $request->get('mountActuality');

        try {
            $data = DB::table('agent_hours_sysca')
                ->select('count_files.count_file', 'agent_hours_sysca.day_register as fecha', DB::raw("count('agent_hours_sysca.created_at') as total"), DB::raw("TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(agent_hours_sysca.tiempo_conexion_agente))), '%H:%i:%s') as tiempo_total"))
                ->leftJoin('count_files', 'count_files.fecha', '=', 'agent_hours_sysca.day_register')
                ->where('agent_hours_sysca.tipo_fuente', '=', $id_type_origin)
                ->where('agent_hours_sysca.id_usuario_registro', '=', $id_usuario_registro)
                ->where('agent_hours_sysca.id_campania', '=', $id_campania)
                ->whereBetween('day_register', [$firstDay, $lastDay])
                ->groupBy('agent_hours_sysca.day_register')
                ->get();

            $datos_configuracion = DB::table('campaigns_month_config_sysca')
                ->select('*')
                ->where('id_campania', '=', $id_campania)
                ->where('id_mes', '=', $mountActuality)
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
        } catch (\Exception $e) {
            $msg = ($e->getMessage() == 'Undefined offset: 0') ? 'La campaña no tiene configurado el mes actual' : 'Error interno, favor de contactar al administrado';


            return response()->json([
                'status' => 'error',
                'message' => $msg,
                'data'  => $e->getMessage()
            ], 200);
        }
    }


    public function get_hours_admin(Request $request)
    {

        $mounth = $request->get('mounth');
        $respuesta = DB::select('CALL get_hours_admin_param(?)', [$mounth]);


        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $respuesta
        ], 200);
    }

    public function getAgentsDanger(Request $request)
    {

        $firstDay = $request->get('firstDay');
        $lastDay = $request->get('lastDay');
        $id_campania = $request->get('id_campania');
        // $respuesta = DB::table('agent_hours_sysca')
        // ->select(DB::raw("count('day_register')", 'nombre_completo_agente'))
        // ->whereBetween('day_register', [$firstDay, $lastDay])
        // ->groupBy('nombre_completo_agente')
        // ->get();


        $respuesta = DB::table('agent_hours_sysca')
            ->select(DB::raw("count('day_register') as total_days"), 'nombre_completo_agente', 'numero_empleado')
            ->whereBetween('day_register', [$firstDay, $lastDay])
            ->where('id_campania', '=', $id_campania)
            ->groupBy('nombre_completo_agente', 'numero_empleado')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $respuesta
        ], 200);
    }

    public function getMonthsCampania(Request $request)
    {
        $id = $request->get('id');

        $months = CampaniaConfiguracionPorMes::with('campania')->where('id_campania', '=', $id)->get();


        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $months
        ], 200);
    }


    public function get_hours_supervisor(Request $request)
    {

        $mounth = $request->get('mounth');
        $id = $request->get('id');
        $idCampania =
            $request->get('idCampania');
        // $respuesta = DB::select('CALL get_hours_admin_fillter(?, ?)', [$mounth, $id]);
        $times = DB::select('CALL get_hours_supervisor(?, ?)', [$mounth, $idCampania]);
        $horas =  array();
        foreach ($times as $key) {
            array_push($horas, $key->tiempo_conexion_agente);
        }
        // Crea el acumulador con el valor inicial de 0 horas
        $totalHoras = CarbonInterval::hours(0);

        // Recorre el arreglo de tiempos y agrega cada tiempo al acumulador
        foreach ($horas as $hora) {
            $intervalo = CarbonInterval::createFromFormat('H:i:s', $hora);
            $totalHoras->add($intervalo);
        }

        $users =
            DB::table('campaigns_group_agents_sysca')
            ->select('campaigns_group_agents_sysca.id_grupo', DB::raw("COUNT('groups_users_sysca.id_grupo') as tot_agents1"))
            ->join('groups_users_sysca', 'groups_users_sysca.id_grupo', '=', 'campaigns_group_agents_sysca.id_grupo')
            ->where('campaigns_group_agents_sysca.id_campania', '=', $idCampania)
            ->groupBy('groups_users_sysca.id_grupo')
            ->get();



        // $mounth = $request->get('mounth');
        // $id = $request->get('id');
        $hora_final = explode(":", $totalHoras->format('%H:%I:%S'));
        $minuts = substr($hora_final[1], 0, 2);
        $secons = substr($hora_final[2], 0, 2);


        $hh = $hora_final[0] . ':' . $minuts . ':' . $secons;

        $data = [
            "id_campania" => $idCampania,
            "nombre" => '',
            "estatus" => '',
            "fecha_creacion" => '',
            "hrs_campania" => 0,
            "tot_agents" => 0,
        ];

        if (count($times) > 0) {
            $data = [
                "id_campania" => $times[0]->id,
                "nombre" => $times[0]->nombre,
                "estatus" => $times[0]->estatus,
                "fecha_creacion" => $times[0]->fecha_creacion,
                "hrs_campania" => $hh,
                "tot_agents" => $users[0]->tot_agents1,
            ];
        }


        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' =>  $data
        ], 200);
    }



    public function getMonthCampania(Request $request)
    {
        $id = $request->get('id');
        $month =
            $request->get('month');

        $months = CampaniaConfiguracionPorMes::where('id_campania', '=', $id)->where('id_mes', '=', $month)->get();


        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $months
        ], 200);
    }

    public function get_data_grafica(Request $request)
    {

        $id = $request->get('id');
        // $respuesta = DB::select('CALL hours_campanias_grafica(?)', [$id]);

        // $respuesta = DB::select('CALL get_grafica(?)', [$id]);


        $respuesta = DB::table('agent_hours_sysca as ah')
            ->select('ah.id_campania', 'ah.tiempo_conexion_agente as hrs_campania', DB::raw('MONTH(ah.day_register) as mes'))
            ->where('ah.id_campania', $id)
            ->get();
        $meses = collect($respuesta)->groupBy('mes');



        $horas_f = array();
        foreach ($meses as $key => $value) {
            $horas = array();
            foreach ($value as $data) {
                array_push($horas, $data->hrs_campania);
            }

            $totalHoras = CarbonInterval::hours(0);

            // Recorre el arreglo de tiempos y agrega cada tiempo al acumulador
            foreach ($horas as $hora) {
                $intervalo = CarbonInterval::createFromFormat('H:i:s', $hora);
                $totalHoras->add($intervalo);
            }

            $hora_final = explode(":", $totalHoras->format('%H:%I:%S'));
            $minuts = substr($hora_final[1], 0, 2);
            $secons = substr($hora_final[2], 0, 2);

            $horas_f[$key] = $hora_final[0] . ':' . $minuts . ':' . $secons;
        }


        $hora_e = array();
        foreach ($horas_f as $key => $value) {
            $time_components = explode(":", $value);

            $hours = intval($time_components[0]);
            $minutes = intval($time_components[1]);
            $seconds = intval($time_components[2]);

            $total_seconds = ($hours * 3600) + ($minutes * 60) + $seconds;
            $total_hours = $total_seconds / 3600;

            $hora_e[$key] = $total_hours;
        }



        $data = [
            'horas' => collect($horas_f),
            'hora_grafica' => collect($hora_e)
        ];


        $ccpm = CampaniaConfiguracionPorMes::where('id_campania', '=', $id)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $data,
            'ccpm' => $ccpm
        ], 200);
    }


    public function getGrafica(Request $request)
    {

        $month = $request->get('month');
        $year = $request->get('year');
        $id_campania = $request->get('id_campania');
        $result = DB::table('agent_hours_sysca as ahs')
            ->select('ahs.tiempo_conexion_agente', 'ahs.numero_empleado', 'u.sueldo', 'u.nombre_completo', DB::raw('DAY(ahs.day_register) as day'))
            ->join('users as u', 'ahs.numero_empleado', '=', 'u.numero_empleado')
            ->whereMonth('ahs.day_register', $month)
            ->whereYear('ahs.day_register', $year)
            ->where('ahs.id_campania', $id_campania)
            ->get();

        if (count($result) > 0) {
            $months = CampaniaConfiguracionPorMes::where('id_campania', '=', $id_campania)->where('id_mes', '=', $month)->get()[0];
            // $dias_mes = 23;
            $dias_mes = $months->dias_habiles;
            // $horas_dias = 8;
            $horas_dias = $months->hrs_jornada;
            $total_horas_trabajar = $dias_mes * $horas_dias;
            $nomina_total = 0;
            $nomina_diaria = 0;
            $meses = collect($result)->groupBy('day');
            $hora_e = [];

            foreach ($meses as $key => $items) {
                $nomina_diaria = 0;
                $empleadosDia = 0;
                $empleado = [];
                foreach ($items as $item) {
                    $sueldo_mensual = $item->sueldo;
                    /*
                    * Costo hora
                    * $sueldo_mensual / $total_horas_trabajar
                    */
                    $costo_hora = ($sueldo_mensual / $total_horas_trabajar) / 60;
                    // Parsea el tiempo de conexión en horas, minutos y segundos
                    list($horas, $minutos, $segundos) = explode(':', $item->tiempo_conexion_agente);

                    // Calcula el total de minutos trabajados
                    $totalMinutosTrabajados = ($horas * 60) + $minutos + ($segundos / 60);

                    // Calcula el total a pagar
                    $totalAPagar = $totalMinutosTrabajados * $costo_hora;

                    // Formatea el total a pagar con dos decimales
                    $totalAPagarFormateado = number_format($totalAPagar, 2);

                    $nomina_total = $nomina_total + $totalAPagar;
                    $nomina_diaria =  $nomina_diaria + $totalAPagar;
                    // $hora_e[$key][] =
                    // ['costo' => $costo_hora, 'sueldo' => $sueldo_mensual, 'horas' => $item->tiempo_conexion_agente, 'nomina_dia' => $totalAPagarFormateado, 'costo_hora' =>  $costo_hora];
                    $empleadosDia++;
                    array_push($empleado, ['numero_empleado' => $item->numero_empleado, 'nombre' => $item->nombre_completo, 'horas_sistema' => $item->tiempo_conexion_agente, 'horas_meta' => $months->hrs_jornada, 'costo_nomina' => $totalAPagarFormateado ]);
                }

                $hora_e[$key]['nomina_dia'] = number_format($nomina_diaria, 2);
                $hora_e[$key]['empleadosDia'] = $empleadosDia;
                $hora_e[$key]['empleados'] = $empleado;
            }
            /*
        * nomina diaria
        * $horas_trabajads / $costo_hora
        */


            $horas = array();
            foreach ($result as $key) {
                array_push($horas, $key->tiempo_conexion_agente);
            }

            // Crea el acumulador con el valor inicial de 0 horas
            $totalHoras = CarbonInterval::hours(0);

            // Recorre el arreglo de tiempos y agrega cada tiempo al acumulador
            foreach ($horas as $hora) {
                $intervalo = CarbonInterval::createFromFormat('H:i:s', $hora);
                $totalHoras->add($intervalo);
            }

            $hora_final = explode(":", $totalHoras->format('%H:%I:%S'));
            $minuts = substr($hora_final[1], 0, 2);
            $secons = substr($hora_final[2], 0, 2);


            $hh = $hora_final[0] . ':' . $minuts . ':' . $secons;




            $totalSumado = AgentHours::whereMonth('day_register', $month)
                ->distinct('numero_empleado')
                ->count('numero_empleado');

            return response()->json([
                'status' => 'success',
                'message' => 'Datos obtenidos correctamente.',
                'data' => $hora_e,
                'nomina_total' => number_format($nomina_total, 2),
                'horas' =>  $hh,
                'agente_atorizados' => $months->numero_agentes,
                'totalSumado' => $totalSumado
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Sin datos.',
            'data' => [],
        ], 200);
    }
    public function get_agents_month(Request $request)
    {
        $id_campania =
            $request->get('id');
        $day =
            $request->get('day_register');

        $mes =
            $request->get('mes');
        $agents = AgentHours::where('id_campania', '=', $id_campania)->where('day_register', '=', $day)->get();


        $datos_configuracion = DB::table('campaigns_month_config_sysca')
            ->select('*')
            ->where('id_campania', '=', $id_campania)
            ->where('id_mes', '=', $mes)
            ->get()[0];



        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $agents,
            'configuracion' => $datos_configuracion
        ], 200);
    }



    public function get_data_campania_months(Request $request){
    
        $id = $request->get('id');

        $configuracion_mes = CampaniaConfiguracionPorMes::where('id_campania', $id)
            ->get();

        $resultado = [];

        foreach ($configuracion_mes as $configuracion) {





            $dias =
                DB::table('agent_hours_sysca as ahs')
                ->select('ahs.tiempo_conexion_agente', 'ahs.numero_empleado', 'u.sueldo', 'u.nombre_completo', DB::raw('DAY(ahs.day_register) as day'))
                ->join('users as u', 'ahs.numero_empleado', '=', 'u.numero_empleado')
                ->where('id_campania', $id)
                ->whereMonth('day_register', $configuracion->id_mes)
                ->get();



            // todo : proceso de calculo
            $dias_mes = $configuracion->dias_habiles;

            // variables
            $horas_dias = $configuracion->hrs_jornada;
            $total_horas_trabajar = $dias_mes * $horas_dias;
            $nomina_total = 0;
            $nomina_diaria = 0;
            $horas_total = array();
            foreach ($dias as $item) {

                $sueldo_mensual = $item->sueldo;
                /*
                    * Costo hora
                    * $sueldo_mensual / $total_horas_trabajar
                    */
                $costo_hora = ($sueldo_mensual / $total_horas_trabajar) / 60;
                // Parsea el tiempo de conexión en horas, minutos y segundos
                list($horas, $minutos, $segundos) = explode(':', $item->tiempo_conexion_agente);

                // Calcula el total de minutos trabajados
                $totalMinutosTrabajados = ($horas * 60) + $minutos + ($segundos / 60);

                // Calcula el total a pagar
                $totalAPagar = $totalMinutosTrabajados * $costo_hora;

                // Formatea el total a pagar con dos decimales
                $totalAPagarFormateado = number_format($totalAPagar, 2);

                $nomina_total = $nomina_total + $totalAPagar;
                $nomina_diaria =  $nomina_diaria + $totalAPagar;
                // $hora_e[$key][] =
                // ['costo' => $costo_hora, 'sueldo' => $sueldo_mensual, 'horas' => $item->tiempo_conexion_agente, 'nomina_dia' => $totalAPagarFormateado, 'costo_hora' =>  $costo_hora];
                // array_push($empleado, ['numero_empleado' => $item->numero_empleado, 'nombre' => $item->nombre_completo, 'horas_sistema' => $item->tiempo_conexion_agente, 'horas_meta' => $months->hrs_jornada, 'costo_nomina' => $totalAPagarFormateado]);





                array_push($horas_total, $item->tiempo_conexion_agente);
            }





            // Crea el acumulador con el valor inicial de 0 horas
            $totalHoras = CarbonInterval::hours(0);

            // Recorre el arreglo de tiempos y agrega cada tiempo al acumulador
            foreach ($horas_total as $hora) {
                $intervalo = CarbonInterval::createFromFormat('H:i:s', $hora);
                $totalHoras->add($intervalo);
            }

            $hora_final = explode(":", $totalHoras->format('%H:%I:%S'));
            $minuts = substr($hora_final[1], 0, 2);
            $secons = substr($hora_final[2], 0, 2);


            $hh = $hora_final[0] . ':' . $minuts . ':' . $secons;




            $diasFina = collect($dias)->groupBy('day');

            $resultado[$configuracion->id_mes] = [
                'configuracion' => $configuracion,
                'dias' => $diasFina,
                'nomina' => $nomina_total,
                'horas_total' => $hh
            ];
        }




        return response()->json([
            'status' => 'success',
            'message' => 'Datos obtenidos correctamente.',
            'data' => $resultado
        ], 200);
    }
}

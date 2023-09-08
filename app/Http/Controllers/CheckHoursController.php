<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Requests\MultipartFormRequest;
use App\Http\Resources\MultipartFormResource;

use App\Models\Campania;
use App\Models\AgentHours;
use App\Models\User;
use App\Models\CountFile;
use Illuminate\Support\Arr;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class CheckHoursController extends Controller
{
    function importData(MultipartFormRequest $request)
    {

        $tipo_fuente = $request['tipo_fuente'];
        $the_file = $request->file('uploaded_file');



        try {



            switch ($tipo_fuente) {
                case 1:
                    $spreadsheet = IOFactory::load($the_file->getRealPath());
                    $sheet        = $spreadsheet->getActiveSheet();
                    $row_limit    = $sheet->getHighestDataRow();
                    $column_limit = $sheet->getHighestDataColumn();
                    $row_range    = range(3, $row_limit);
                    $column_range = range('R', $column_limit);
                    $startcount = 3;
                    $data = array();

                    foreach ($row_range as $row) {

                        $hora = $sheet->getCell('C' . $row)->getValue();
                        $UNIX_HOUR = ($hora - 25569) * 86400;
                        $hora_fin =  gmdate("H:i", $UNIX_HOUR);

                        $data[] = [
                            "id_usuario_registro" => $request['user_id'],
                            "tipo_fuente" => $request['tipo_fuente'],
                            "numero_empleado" => $sheet->getCell('K' . $row)->getValue(),
                            "nombre_completo_agente" => $sheet->getCell('B' . $row)->getValue(),
                            "agente_nombre" =>  '',
                            "agente_paterno" => '',
                            "agente_materno" => '',
                            "email_agente_fuente" => '',
                            "horas_sistema_agente" => $hora_fin, // columna C --> System Hrs Formato HR
                            "horas_login_agente" => '',
                            "horas_logout_agente" => '',
                            "tiempo_conexion_agente" => $sheet->getCell('M' . $row)->getValue(), // columna D --> AFD Formato HR
                            "procentaje_conexion_agente" => $sheet->getCell('E' . $row)->getValue(),
                            "tiempo_descanso_agente" => $sheet->getCell('N' . $row)->getValue(), // columna F --> 30 Minute Break Formato HR
                            "tiempo_entrenamiento_agente" => $sheet->getCell('P' . $row)->getValue(), // columna H --> Program Training Formato HR
                            "tiempo_reuniones_agente" => $sheet->getCell('I' . $row)->getValue(), // columna I --> Meeting-Supervisor Formato HR
                        ];
                        // AgentHours::create($data);
                        $startcount++;
                    }
                    break;
                case 2:
                    $spreadsheet = IOFactory::load($the_file->getRealPath());
                    $sheet        = $spreadsheet->getActiveSheet();
                    $row_limit    = $sheet->getHighestDataRow();
                    $column_limit = $sheet->getHighestDataColumn();
                    $row_range    = range(2, $row_limit);
                    $column_range = range('K', $column_limit);
                    $startcount = 2;
                    $data = array();

                    foreach ($row_range as $row) {

                        $data[] = [
                            "id_usuario_registro" => $request['user_id'],
                            "tipo_fuente" => $request['tipo_fuente'],
                            "numero_empleado" => $sheet->getCell('H' . $row)->getValue(),
                            "nombre_completo_agente" => $sheet->getCell('C' . $row)->getValue() . ' ' . $sheet->getCell('D' . $row)->getValue(),
                            "agente_nombre" =>  $sheet->getCell('C' . $row)->getValue(),
                            "agente_paterno" => $sheet->getCell('D' . $row)->getValue(),
                            "agente_materno" => '',
                            "email_agente_fuente" => $sheet->getCell('A' . $row)->getValue(),
                            "horas_sistema_agente" => '01:20:35', // columna C
                            "horas_login_agente" => $sheet->getCell('J' . $row)->getValue(),
                            "horas_logout_agente" => $sheet->getCell('K' . $row)->getValue(),
                            "tiempo_conexion_agente" => $sheet->getCell('G' . $row)->getValue(), // columna D
                            "procentaje_conexion_agente" => 0,
                            "tiempo_descanso_agente" => '', // columna F
                            "tiempo_entrenamiento_agente" => '', // columna H
                            "tiempo_reuniones_agente" => '', // columna I
                        ];
                        // AgentHours::create($data);
                        $startcount++;
                    }

                    break;
                case 10:
                    return response()->json([
                        'status' => 'success',
                        'msg' => 'otros Datos guardados correctamente.',

                    ]);
                    break;

                default:
                    # code...
                    break;
            }



            // AgentHours::insert($data);
            return response()->json([
                'status' => 'success',
                'msg' => ' Datos guardados correctamente.',
                'data' => $data
            ]);
            //    DB::table('tbl_customer')->insert($data);
        } catch (\Exception $e) {
            $error_code = $e->getMessage();
            return response()->json([
                'msg' => ' Datos',
                'data' => $error_code
            ]);
            //    return back()->withErrors('There was a problem uploading the data!');
        }
        //    return back()->withSuccess('Great! Data has been successfully uploaded.');
    }


    public function loadJson(Request $request)
    {
        $tipo_fuente = $request['tipo_fuente'];
        $data = array();
        $datos = json_decode($request['data'], true, 512, JSON_THROW_ON_ERROR);
        $id_campania =  $request['id_campania'];
        $day_register = $request['day_register'];


        $registros = AgentHours::where('id_campania', '=', $id_campania)->where('day_register', '=', $day_register);
        $registros->delete();
        $totalRegistros = 0;
        try {
            switch ($tipo_fuente) {
                case 1:

                    unset($datos[0]);
                    $userNotValid = [];
                    foreach ($datos as $dato) {
                        $totalRegistros++;
                        // validar usuario en el grupo de la campaña
                        $num_empleado = $dato['No empleado'];
                        if ($this->existUser($num_empleado)) {
                            if ($this->validateUser($id_campania, $num_empleado)) {
                                $hour_system = (!empty($dato['System Hrs to Away from Desk %']) ? $dato['System Hrs to Away from Desk %'] : null);
                                $hour_system_final = (!empty($hour_system)) ? substr($hour_system, 0, -1) : 0;

                                $data = [
                                    "id_usuario_registro" => $request['user_id'],
                                    "tipo_fuente" => $request['tipo_fuente'],
                                    "numero_empleado" => $dato['No empleado'],
                                    "nombre_completo_agente" =>  $dato['DisplayName'],
                                    "agente_nombre" =>  '',
                                    "agente_paterno" => '',
                                    "agente_materno" => '',
                                    "email_agente_fuente" => '',
                                    "horas_sistema_agente" => $dato['System Hrs Formato HR'], // columna C
                                    "horas_login_agente" => '',
                                    "horas_logout_agente" => '',
                                    "tiempo_conexion_agente" =>  $dato['AFD Formato HR'],
                                    "procentaje_conexion_agente" =>  $hour_system_final,
                                    "tiempo_descanso_agente" =>  $dato['30 Minute Break Formato HR'],
                                    "tiempo_entrenamiento_agente" =>  $dato['Program Training Formato HR'],
                                    "tiempo_reuniones_agente" =>  $dato['Meeting-Supervisor Formato HR'],
                                    'id_campania' => $request['id_campania'],
                                    'day_register' => $request['day_register'],
                                ];

                                AgentHours::create($data);
                            }
                        } else {
                            array_push($userNotValid, $dato);
                        }
                    }
                    $coutnt_file = [
                        'count_file' => $totalRegistros,
                        'fecha' => $request['day_register']
                    ];
                    CountFile::create($coutnt_file);
                    break;

                    // TALA
                case 2:
                    $userNotValid = array();

                    $productosAgrupados = collect($datos)->groupBy('NO EMPLEADO');

                    foreach ($productosAgrupados as $dato) {
                        $totalRegistros++;
                        $horas = array();
                        $agente = $dato[0];
                        $num_empleado = $agente['NO EMPLEADO'];
                        if ($this->existUser($num_empleado)) {
                            if ($this->validateUser($id_campania, $num_empleado)) {
                                foreach ($dato as $d) {
                                    array_push($horas, $d['LOGIN TIME']);
                                }
                                $total_s = array_reduce($horas, function ($carry, $time) {
                                    return $carry + strtotime("1970-01-01 $time UTC");
                                });
                                $totalT = gmdate("H:i:s", $total_s);
                                $data = [
                                    "id_usuario_registro" => $request['user_id'],
                                    "tipo_fuente" => $tipo_fuente,
                                    "numero_empleado" => $agente['NO EMPLEADO'],
                                    "nombre_completo_agente" => $agente['AGENT FIRST NAME'] . ' ' . $agente['AGENT LAST NAME'],
                                    "agente_nombre" =>  $agente['AGENT FIRST NAME'],
                                    "agente_paterno" => $agente['AGENT LAST NAME'],
                                    "agente_materno" => '',
                                    "email_agente_fuente" => $agente['AGENT'],
                                    "horas_sistema_agente" => '00:00:00', // columna C
                                    "horas_login_agente" => $agente['LOGIN TIMESTAMP_1'],
                                    "horas_logout_agente" => $agente['LOGOUT TIMESTAMP_1'],
                                    "tiempo_conexion_agente" => $totalT, // columna D
                                    "procentaje_conexion_agente" => 0,
                                    "tiempo_descanso_agente" => '00:00:00', // columna F
                                    "tiempo_entrenamiento_agente" => '00:00:00', // columna H
                                    "tiempo_reuniones_agente" => '00:00:00', // columna I
                                    'id_campania' => $request['id_campania'],
                                    'day_register' => $request['day_register'],
                                ];

                                return response()->json([
                                    'status' => 'success',
                                    'msg' => ' Datos guardados correctamente.',
                                    'data' => $data,
                                ]);
                                AgentHours::create($data);
                            }
                        } else {
                            array_push($userNotValid, $agente);
                        }
                    }
                    $coutnt_file = [
                        'count_file' => $totalRegistros,
                        'fecha' => $request['day_register']
                    ];
                    CountFile::create($coutnt_file);
                    break;
                default:
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'El tipo de fuente no existe.',

                    ]);
                    break;
            }



            return response()->json([
                'status' => 'success',
                'msg' => ' Datos guardados correctamente.',
                'data' => $datos,
                'userNoValid' => $userNotValid,
                // 'times' => $productosAgrupados
            ]);
        } catch (\Exception $e) {
            $error_code = $e->getMessage();
            return response()->json([
                'status' => 'error',
                'msg' => ' Datos',
                'data' => $error_code
            ]);
            //    return back()->withErrors('There was a problem uploading the data!');
        }
    }


    public function validateUser($id_campania, $num_empleado)
    {
        $campania = Campania::with('groups.agentes')->where('id', '=', $id_campania)->get()[0];
        $agentes = $campania->groups[0]->agentes;
        return ($agentes->contains('numero_empleado', $num_empleado)) ? true : false;
    }


    public function existUser($numero_empleado)
    {

        $user = User::where('numero_empleado', '=', $numero_empleado)->get();

        return (!$user->isEmpty()) ? true : false;
    }
}

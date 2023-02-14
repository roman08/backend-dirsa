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


use App\Models\AgentHours;
class CheckHoursController extends Controller
{
    function importData(MultipartFormRequest $request){


       $the_file = $request->file('uploaded_file');

       try{
           $spreadsheet = IOFactory::load($the_file->getRealPath());
           $sheet        = $spreadsheet->getActiveSheet();
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_range    = range( 3, $row_limit );
           $column_range = range( 'F', $column_limit );
           $startcount = 3;
           $data = array();
           foreach ( $row_range as $row ) {

               $data = [
                    "id_usuario_registro" => $request['user_id'],
                    "tipo_fuente" => $request['tipo_fuente'],
                    "numero_empleado" =>$sheet->getCell( 'K' . $row )->getValue(),
                    "nombre_completo_agente" => $sheet->getCell( 'B' . $row )->getValue(),
                    "agente_nombre" =>  '',
                    "agente_paterno" => '',
                    "agente_materno" => '',
                    "email_agente_fuente" => '',
                    "horas_sistema_agente" => '01:20:35', // columna C
                    "horas_login_agente" => '', 
                    "horas_logout_agente" => '', 
                    "tiempo_conexion_agente" => '01:20:35', // columna D
                    "procentaje_conexion_agente" => $sheet->getCell( 'E' . $row )->getValue(),
                    "tiempo_descanso_agente" => '01:20:35', // columna F
                    "tiempo_entrenamiento_agente" => '01:20:35', // columna H
                    "tiempo_reuniones_agente" => '01:20:35', // columna I
               ];

               AgentHours::create($data);
               $startcount++;
           }

            // AgentHours::insert($data);
             return response()->json([
                'status' => 'success',
                'msg' =>' Datos guardados correctamente.',
                'data' => $data
            ]);
        //    DB::table('tbl_customer')->insert($data);
       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
            return response()->json([
                'msg' =>' Datos',
                'data' => $error_code
            ]);
        //    return back()->withErrors('There was a problem uploading the data!');
       }
    //    return back()->withSuccess('Great! Data has been successfully uploaded.');
   }

}

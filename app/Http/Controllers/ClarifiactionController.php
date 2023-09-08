<?php

namespace App\Http\Controllers;

use App\Models\clarifications;
use App\Models\categories_clarifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AgentHours;

class ClarifiactionController extends Controller
{
    public function getAll()
    {

        $data = clarifications::with('cat')->get();



        foreach ($data as $clarification) {
            // Realiza aquí la modificación que necesitas en cada registro
            $imagenPath = url(Storage::url($clarification['file']));
            $clarification['file'] = $imagenPath;
            // Puedes cambiar 'propiedad_a_modificar' y 'nuevo_valor' según tus necesidades
        }



        return response()->json([
            'status' => 'success',
            'message' => 'Usuarios obtenidos correctamente',
            'data' => $data
        ], 200);
    }

    public function donwloadFile(Request $request)
    {

        $id =
        $request->get('id');


        $imagen = clarifications::find($id);
        
        if (!$imagen) {
            return response()->json(['error' => 'Imagen no encontrada'], 404);
        }

        $ruta = Storage::path($imagen->file);
        // return response()->json(['error' => $ruta], 404);
        return response()->download($ruta, 'comprobante_de_ausencia');
    }


    public function create(Request $request)
    {

        // Validar la solicitud para asegurarse de que contiene una imagen.
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:2048'
        ]);

        // Guardar la imagen en el sistema de archivos de Laravel (en storage/app/public por ejemplo).
        $imagenPath = $request->file->store('public');


        // $data = $request->all();
        $metadata =  json_decode($request->metadata);
        foreach ($metadata as $key) {


            $horaFormateada = Carbon::createFromTime($key->cantidad, 0, 0)->format('h:i:s');
            $data = [
                "id_usuario_registro" => $request->id_user,
                "tipo_fuente" => $request->campaign_id  == 1 ? 2 : 1,
                "numero_empleado" =>  $request->employee_number,
                "nombre_completo_agente" => $request->name,
                "agente_nombre" =>  $request->name,
                "agente_paterno" => '',
                "agente_materno" => '',
                "email_agente_fuente" => '',
                "horas_sistema_agente" => '00:00:00', // columna C
                "horas_login_agente" => '00:00:00',
                "horas_logout_agente" => '00:00:00',
                "tiempo_conexion_agente" => $horaFormateada, // columna D
                "procentaje_conexion_agente" => 0,
                "tiempo_descanso_agente" => '00:00:00', // columna F
                "tiempo_entrenamiento_agente" => '00:00:00', // columna H
                "tiempo_reuniones_agente" => '00:00:00', // columna I
                'id_campania' => $request->campaign_id,
                'day_register' => $key->fecha,
            ];



            clarifications::create([
                'campaign_id' =>  $request->campaign_id,
                'cut_date' =>  $request->cut_date,
                'date' => Carbon::parse($key->fecha)->format('d-m-Y') ,
                'employee_number' =>  $request->employee_number,
                'file' =>  $imagenPath,
                'hours' => $key->cantidad,
                'id_categorie' => $key->tipo,
                'id_user' =>  $request->id_user,
                'name' =>  $request->name,
                'observations' =>  $request->observations
            ]);

            AgentHours::create($data);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Aclaracion creada correctamente',
            'data' =>   $request->observations
        ], 200);
    }


    public function getCatClarificatiosn()
    {
        $cat = categories_clarifications::where('status', '=', 1)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Categorias obtenidas correctamente.',
            'data' => $cat
        ], 200);
    }


    public function filtros( Request $request){
        $fechaInicio  = Carbon::parse($request['fechaInicio'])->format('d-m-Y') ;
        $fechaFin = Carbon::parse($request['fechaFin'])->format('d-m-Y');
        $campaign_id = $request['campaign_id'];

        $data = clarifications::whereBetween('date', [$fechaInicio, $fechaFin])->where('campaign_id', '=', $campaign_id)->get();

        foreach ($data as $clarification) {
            // Realiza aquí la modificación que necesitas en cada registro
            $imagenPath = url(Storage::url($clarification['file']));
            $clarification['file'] = $imagenPath;
        }


        return response()->json([
            'status' => 'success',
            'message' => 'Aclaraciones obtenidas correctamente.',
            'data' => $data
        ], 200);
    }
}

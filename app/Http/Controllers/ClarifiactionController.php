<?php

namespace App\Http\Controllers;

use App\Models\clarifications;
use App\Models\categories_clarifications;

use Illuminate\Http\Request;

class ClarifiactionController extends Controller
{
    public function getAll(){
        
    $data = clarifications::all();
    return response()->json([
        'status' => 'success',
        'message' => 'Usuarios obtenidos correctamente',
        'data' => $data
    ], 200);
    }
    
    public function create(Request $request){


        $data = $request->all();
        $metadara = $data['metadata'];

        $body = array();

        foreach ($metadara as $key) {



            clarifications::create([
                'campaign_id' => $data['campaign_id'],
                'cut_date' => $data['cut_date'],
                'date' => $key['fecha'],
                'employee_number' => $data['employee_number'],
                'file' => $data['file'],
                'hours' => $key['cantidad'],
                'id_categorie' => $key['tipo'],
                'id_user' => $data['id_user'],
                'name' => $data['name'],
                'observations' => $data['observations']
           ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Usuarios obtenidos correctamente',
            'data' => $body
        ], 200);

    }


    public function getCatClarificatiosn(){
        $cat = categories_clarifications::where('status','=',1)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Categorias obtenidas correctamente.',
            'data' => $cat
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TypePay;

class GeneralController extends Controller
{
    public function getAgents(Request $request){

        $id = $request->get('id');

        $agents = User::select('id', 'nombre_completo')->where('id_puesto', '=', $id)->orderBy('nombre_completo', 'ASC')->get();

        return response()->json([
                'status' => 'success',
                'message' => 'Agentes obtenidos correctamente',
                'data' => $agents
            ], 200);

    }


    public function getTypePays(){
        $typePays = TypePay::all();

        return response()->json([
                'status' => 'success',
                'message' => 'Get agentes',
                'data' => $typePays
            ], 200);

    }

    public function getLeaders(){
        
        $leaders = User::select('id', 'nombre_completo')->where('id_puesto', '=', 37)->orderBy('nombre_completo', 'ASC')->get();

        return response()->json([
                'status' => 'success',
                'message' => 'Lideres obtenidos correctamente',
                'data' => $leaders
            ], 200);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TypePay;
use App\Models\CatTypeOrigin;


class GeneralController extends Controller
{

    public function getAllAgents(){
        $agents = User::with('campanias')->where('id_puesto', '=', 1)->orWhere('id_puesto', '=', 2)->orderBy('nombre_completo', 'ASC')->paginate(10);
        return response()->json([
            'status' => 'success',
            'message' => 'Agentes obtenidos correctamente',
            'data' => $agents
        ], 200);

    }
    public function getAgents(Request $request){

        $id = $request->get('id');

        $agents = User::select('id', 'nombre_completo', 'numero_empleado')->where('id_puesto', '=', $id)->orderBy('nombre_completo', 'ASC')->get();

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

    public function getTypeOrigins(){
        $origins = CatTypeOrigin::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Oirigenes obtenidos correctamente',
            'data' => $origins
        ], 200);

    }


    public function agentDetail( Request $request){
        $id = $request->get('id');
        $agent = User::with('campanias')->find($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Agentes obtenidos correctamente',
            'data' => $agent
        ], 200);
    }

}

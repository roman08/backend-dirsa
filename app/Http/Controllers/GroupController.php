<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grupo;
use App\Models\GrupoUsuario;
use DateTime;
class GroupController extends Controller
{

    public function getGroups(){
        
        // $users = $this->user->with('salutation')->all();
        $groups = Grupo::with('agentes')->get();
       return response()->json([
                'status' => 'success',
                'message' => 'Create group',
                'data' => $groups
            ], 200);
    }
    public function createGroup(Request $request){
        $datetime = new \DateTime('NOW');

        //se valida la información que viene en $request
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:50',
            'estatus' => '',
            'agents' =>''
        ]);


        //se crea el usuario en la base de datos
        $group = Grupo::create([
            'nombre' => $validatedData['nombre'],
            'estatus' => $validatedData['estatus'],
        ]);

        

        // $agents = json_decode($validatedData['agents']);
        foreach ($validatedData['agents'] as $value) {
            $user = GrupoUsuario::create([
                'id_usuario' => $value,
                'id_grupo' => $group->id,
                'fecha_ingreso' => $datetime,
                'fecha_salida' => $datetime 
            ]);
        }
        

        return response()->json([
                'status' => 'success',
                'message' => 'Grupo creado correctamente',
            ], 200);
    }
}

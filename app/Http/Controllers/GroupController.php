<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grupo;
use App\Models\GrupoUsuario;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{

    public function getGroups(){
        
        // $users = $this->user->with('salutation')->all();
        $groups = Grupo::with('agentes')->where('estatus', '=', 'Activo')->get();
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
            'agents' =>'',
            'id_tipo_agente' => ''
        ]);


        //se crea el usuario en la base de datos
        $group = Grupo::create([
            'nombre' => $validatedData['nombre'],
            'estatus' => $validatedData['estatus'],
            'id_tipo_agente' => $validatedData['id_tipo_agente'],
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

    public function delete(Request $request) {

        $id = $request['id'];

        $group = Grupo::find($id);
        $group->estatus = 'Inactivo';
        $group->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Grupo eliminado correctamente',
            'data' => ''
        ], 200);
    }

    public function getById(Request $request) {
        $id = $request['id'];
        $group = Grupo::with('agentes')->find($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Grupo obtenido correctamente',
            'data' => $group
        ], 200);
    }

    public function update( Request $request ){

        $datetime = new \DateTime('NOW');

        $id = $request['id'];
        $group = Grupo::find($id);

        $group->nombre = $request['nombre'];
        $group->estatus = $request['estatus'];
        $group->id_tipo_agente = $request['id_tipo_agente'];

        $group->save();

        GrupoUsuario::where('id_grupo', $id)->delete();

        foreach ($request['agents'] as $value) {
            $user = GrupoUsuario::create([
                'id_usuario' => $value,
                'id_grupo' => $id,
                'fecha_ingreso' => $datetime,
                'fecha_salida' => $datetime
            ]);
        }
        

        return response()->json([
            'status' => 'success',
            'message' => 'Grupo actualizado correctamente',
            'data' => $group
        ], 200);
    }

    public function getGroupFilter(){
         $groups = DB::table('grupos')->select('*')
            ->whereNotIn('id',(function ($query) {
	            $query->from('grupo_usuarios')
		            ->select('grupo_usuarios.id_grupo');
                }))
        ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Grupos obtenidos correctamente',
            'data' => $groups
        ], 200);
    }
}

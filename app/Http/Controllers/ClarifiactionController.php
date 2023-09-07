<?php

namespace App\Http\Controllers;

use App\Models\clarifications;
use Illuminate\Http\Request;

class ClarifiactionController extends Controller
{
    
    public function create(Request $request){


        $data = $request->all();

        $clarifications = clarifications::create([
            'id_user' => $data['id_user'],
            'file' => $data['file'],
            'id_categorie' => $data['id_categorie'],
            'observations' => $data['observations'],
            'days' => $data['days'],
            'metadata' => $data['metadata'],
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Usuarios obtenidos correctamente',
            'data' => 'creado correctamente'
        ], 200);

    }

}

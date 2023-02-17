<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class LeaderContoller extends Controller
{
    public function getCampaniasLeader( Request $request ){

        $id = $request->get('id');
        $user = User::with('campanias')->where('id', '=', $id)->get()[0];

        return response()->json([
            'status' => 'success',
            'message' => 'Campañas obtenidas correctamente',
            'data' => $user['campanias'],
        ], 200);
    }
}

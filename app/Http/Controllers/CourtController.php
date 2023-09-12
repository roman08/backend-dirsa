<?php

namespace App\Http\Controllers;

use App\Models\payrollCut;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    public function getAll(){
        $courts = payrollCut::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Fechas de corte  obtenidas correctamente.',
            'data' => $courts
        ], 200);
    }

    public function create( Request $request) {

        payrollCut::create([
        'yaer' => $request->yaer,
        'month' => $request->month,
        'pay_day' => $request->pay_day,
        'start_day' => $request->start_day,
        'end_day' => $request->end_day,
        'dispersion_day' => $request->dispersion_day,
        'court' => $request->court,
        'user_id' => $request->user_id,
        ]);
    }

    public function delete( Request $request){

        $id = $request->get('id');
        payrollCut::find($id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Fechas de corte  obtenidas correctamente.',
            'data' => $request->get('id')
        ], 200);
    }
}

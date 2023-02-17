<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CampaniaController;
use App\Http\Controllers\CheckHoursController;
use App\Http\Controllers\LeaderContoller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ROUTES AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/datauser', [AuthController::class, 'dataUser'])->middleware('auth:sanctum');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/send-mail', [AuthController::class, 'sendEmail']);


// ROUTES GROUP
Route::get('/get-groups', [GroupController::class, 'getGroups']);
Route::post('/create-group', [GroupController::class, 'createGroup']);

// ROUTES GENERALES
Route::get('/agents', [GeneralController::class, 'getAgents']);
Route::get('/typePays', [GeneralController::class, 'getTypePays']);
Route::get('/leaders', [GeneralController::class, 'getLeaders']);


// ROUTES CAMPAÑAS 
Route::get('/campanias', [CampaniaController::class, 'get']);
Route::post('/campania/create', [CampaniaController::class, 'create']);
Route::post('/campania/addMonth', [CampaniaController::class, 'addMonth']);


//  ROUTES CONTROL HORAS
Route::post('/checkHours/importData', [CheckHoursController::class, 'importData']);
Route::post('/checkHours/loadJson', [CheckHoursController::class, 'loadJson']);

//  ROUTES 
Route::get('/leader/campanias', [LeaderContoller::class, 'getCampaniasLeader']);


// TODO: RUTAS ENTRENADOR
Route::get('/obtenerEntrenadores', [CoachController::class, 'index'])->middleware('auth:sanctum');
Route::post('/crearEntrenador', [CoachController::class, 'store']);
Route::post('/actualizarEntrenador', [CoachController::class, 'update']);
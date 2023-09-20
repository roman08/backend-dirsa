<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CampaniaController;
use App\Http\Controllers\CheckHoursController;
use App\Http\Controllers\LeaderContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClarifiactionController;
use App\Http\Controllers\CourtController;

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
Route::get('/getGroupFilter', [GroupController::class, 'getGroupFilter']);
Route::post('/create-group', [GroupController::class, 'createGroup']);
Route::get('/grupo/delete', [GroupController::class, 'delete']);
Route::get('/grupo/getById', [GroupController::class, 'getById']);
Route::post('/grupo/update', [GroupController::class, 'update']);

// ROUTES GENERALES
Route::get('/agents/all', [GeneralController::class, 'getAllAgents']);
Route::get('/agents', [GeneralController::class, 'getAgents']);
Route::get('/typePays', [GeneralController::class, 'getTypePays']);
Route::get('/leaders', [GeneralController::class, 'getLeaders']);
Route::get('/origins', [GeneralController::class, 'getTypeOrigins']);
Route::get('/agents/detail', [GeneralController::class, 'agentDetail']);
Route::get('/test', [GeneralController::class, 'test']);



// ROUTES CAMPAÑAS 
Route::get('/campanias', [CampaniaController::class, 'get']);
Route::post('/campania/create', [CampaniaController::class, 'create']);
Route::post('/campania/addMonth', [CampaniaController::class, 'addMonth']);
Route::get('/campanias/getCampaaniasAdmin', [CampaniaController::class, 'getCampaaniasAdmin']);
Route::get('/campanias/delete', [CampaniaController::class, 'delete']);
Route::get('/campanias/getById', [CampaniaController::class, 'getById']);
Route::post('/campania/update', [CampaniaController::class, 'update']);
Route::get('/campanias/getCampaniaAgent', [CampaniaController::class, 'getCampaniaAgent']);
Route::get('/campanias/getHoursAdmin', [CampaniaController::class, 'get_hours_admin']);
Route::get('/campanias/getHoursSupervisor', [CampaniaController::class, 'get_hours_supervisor']);
Route::get('/campanias/getAgentsDanger', [CampaniaController::class, 'getAgentsDanger']);
Route::get('/campanias/getMonthsCampania', [CampaniaController::class, 'getMonthsCampania']);
Route::get('/campanias/getDataCampaniaMonths', [CampaniaController::class, 'get_data_campania_months']);

Route::get('/campanias/getMonthCampania', [CampaniaController::class, 'getMonthCampania']);
Route::get('/campanias/getDataGrafica', [ CampaniaController::class, 'get_data_grafica']);
Route::get('/campanias/getAgentsMonth', [CampaniaController::class, 'get_agents_month']);
Route::get('/campanias/campaingReport', [CampaniaController::class, 'get_data_grafica_report']);

//  ROUTES CONTROL HORAS
Route::post('/checkHours/importData', [CheckHoursController::class, 'importData']);
Route::post('/checkHours/loadJson', [CheckHoursController::class, 'loadJson']);
//  ROUTES 
Route::get('/leader/campanias', [LeaderContoller::class, 'getCampaniasLeader']);


// ROUTES ADMIN GRAFICA
Route::get('/admin/grafica', [CampaniaController::class, 'getGrafica']);
Route::get('/admin/geDataDays', [CampaniaController::class, 'geDataDays']);

// ROUTES ACLARACINES
Route::get('/clarifications/getUser', [UserController::class, 'getUser']);
Route::post('/clarifications/create', [ClarifiactionController::class, 'create']);
Route:: get('/clarifications/getCatClarificatiosn', [ClarifiactionController::class, 'getCatClarificatiosn']);
Route::get('/clarifications/getAll', [ClarifiactionController::class, 'getAll']);

Route::get('/clarifications/donwloadFile', [ClarifiactionController::class, 'donwloadFile']);
Route::post('/clarifications/filtros', [ClarifiactionController::class, 'filtros']);


//  ROUTES COURTS
Route::get('/court/getAll', [CourtController::class, 'getAll']);
Route::post('/court/create', [CourtController::class, 'create']);
Route::delete( '/court/delete', [CourtController::class, 'delete']);
Route::put('/court/edit', [CourtController::class, 'edit']);
Route::post('/court/filter', [CourtController::class, 'filter']);

// TODO: RUTAS ENTRENADOR
Route::get('/obtenerEntrenadores', [CoachController::class, 'index'])->middleware('auth:sanctum');
Route::post('/crearEntrenador', [CoachController::class, 'store']);
Route::post('/actualizarEntrenador', [CoachController::class, 'update']);
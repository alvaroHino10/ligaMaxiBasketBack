<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControlPartidoController;
use App\Http\Controllers\DelegadoController;
use App\Http\Controllers\PreInscripcionController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;
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

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiResource('preinscripcion', PreInscripcionController::class);
    Route::apiResource('equipo', EquipoController::class);
    Route::apiResource('jugador', JugadorController::class);
    Route::apiResource('partido',PartidoController::class);
    Route::apiResource('control-partido', ControlPartidoController::class);
    Route::delete('logout', [AuthController::class, 'logout']);
});

Route::post('signup', [AuthController::class, 'signup']);
Route::post('signin', [AuthController::class, 'signin']); 
Route::apiResource('delegado',DelegadoController::class);



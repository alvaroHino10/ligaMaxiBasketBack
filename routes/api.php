<?php

use App\Http\Controllers\DelegadoController;
use App\Http\Controllers\PreInscripcionController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
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

Route::apiResource('delegado',DelegadoController::class);
Route::apiResource('preinscripcion', PreInscripcionController::class);
Route::apiResource('equipo', EquipoController::class);
Route::apiResource('jugador', JugadorController::class);

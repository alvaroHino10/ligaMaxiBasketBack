<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControlPartidoController;
use App\Http\Controllers\DelegadoController;
use App\Http\Controllers\PreInscripcionController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\TorneoController;
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

/*Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('preinscripcion', PreInscripcionController::class);
    Route::apiResource('equipo', EquipoController::class);
    Route::apiResource('jugador', JugadorController::class);
    Route::apiResource('partido', PartidoController::class);
    Route::apiResource('control-partido', ControlPartidoController::class);
    Route::get('torneo/{torneo}/equipos', [TorneoController::class, 'showEquiposTorneo']);
    Route::apiResource('torneo', TorneoController::class);
    Route::prefix('jugador/{jugador}')->group(function () {
        Route::put('/canasta_simple', [JugadorController::class, 'updateCanastaSimple']);
        Route::put('/canasta_doble', [JugadorController::class, 'updateCanastaDoble']);
        Route::put('/canasta_triple', [JugadorController::class, 'updateCanastaTriple']);
        Route::put('/faltas', [JugadorController::class, 'updateFaltas']);
        Route::get('/estadisticas', [JugadorController::class, 'getEstadisticasJugador']);
    });
    Route::delete('logout', [AuthController::class, 'logout']);
});*/

Route::post('signup', [AuthController::class, 'signup']);
Route::post('signin', [AuthController::class, 'signin']);
Route::apiResource('delegado', DelegadoController::class);

Route::apiResource('preinscripcion', PreInscripcionController::class);
Route::apiResource('equipo', EquipoController::class);
Route::apiResource('jugador', JugadorController::class);
Route::apiResource('partido', PartidoController::class);
Route::apiResource('control-partido', ControlPartidoController::class);
Route::get('torneo/{torneo}/equipos', [TorneoController::class, 'showEquiposTorneo']);
Route::apiResource('torneo', TorneoController::class);
Route::prefix('jugador/{jugador}')->group(function () {
    Route::put('/canasta_simple', [JugadorController::class, 'updateCanastaSimple']);
    Route::put('/canasta_doble', [JugadorController::class, 'updateCanastaDoble']);
    Route::put('/canasta_triple', [JugadorController::class, 'updateCanastaTriple']);
    Route::put('/faltas', [JugadorController::class, 'updateFaltas']);
    Route::get('/estadisticas', [JugadorController::class, 'getEstadisticasJugador']);
});

Route::prefix('delegado/{delegado}')->group(function () {
    Route::get('/preinscripciones', [DelegadoController::class, 'preinscripciones']);
});

Route::delete('logout', [AuthController::class, 'logout']);

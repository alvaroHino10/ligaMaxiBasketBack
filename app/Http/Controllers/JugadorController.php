<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarJugadorRequest;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugador = Jugador::all();
        return response($jugador, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarJugadorRequest $request)
    {
        Jugador::create($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Jugador guardado correctamente'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugador = Jugador::find($id);
        return response()->json([
            'confirmacion' => true,
            'cuerpotecnico' => $jugador
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jugador = Jugador::find($id)->update($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Datos del jugador actualizados correctamente'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugador = Jugador::find($id)->delete();
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Jugador eliminado'
        ],200);
    }
}

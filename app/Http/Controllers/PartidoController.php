<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarPartidoRequest;
use App\Http\Resources\PartidoResource;
use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPartidos = Partido::all();
        return PartidoResource::collection($listaPartidos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPartidoRequest $request)
    {
        $partido = Partido::create($request->all());
        
        return (new PartidoResource($partido))->additional(['mensaje' => 'Partido registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
        return new PartidoResource($partido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarPartidoRequest $request, Partido $partido)
    {
        $partido->update($request->all());
        return (new PartidoResource($partido))->additional(['mensaje' => 'Partido actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        $partido->delete();
        return (new PartidoResource($partido))->additional(['mensaje' => 'Partido eliminado']);
    }
}

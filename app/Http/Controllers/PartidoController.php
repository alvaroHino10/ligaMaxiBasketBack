<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarPartidoRequest;
use App\Http\Requests\ModificarPuntajePartidoRequest;
use App\Http\Resources\PartidoResource;
use App\Models\EquipoData;
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
        $datosValidados = $request->all();
        $datosPartido = $datosValidados['partido'];

        $primerEquipo = $datosValidados['equipo_A'];
        $segundoEquipo = $datosValidados['equipo_B'];

        $primerArbitro = $datosValidados['arbitro_1'];
        $segundoArbitro = $datosValidados['arbitro_2'];
        $fiscal = $datosValidados['fiscal'];
        $mesa = $datosValidados['mesa'];

        $partido = Partido::create($datosPartido);

        $partido->equipos()->attach([$primerEquipo,$segundoEquipo]);

        $partido->controladoresPartido()->attach([$primerArbitro,$segundoArbitro,$fiscal,$mesa]);
        
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

    public function incrementarPuntaje(ModificarPuntajePartidoRequest $request, Partido $partido, EquipoData $equipo){
        $datosPartido = $request->all();

        $periodo = $datosPartido['periodo_especifico'];
        $operacion = $datosPartido['operacion_canasta'];

        $puntajePartido = $partido->equipos()->where('cod_equi_data',$equipo->cod_equi_data)->first()->pivot;
        $puntajePartido->increment($periodo,$operacion);
    }
}

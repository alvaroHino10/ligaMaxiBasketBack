<?php

namespace App\Http\Controllers;

use App\Http\Requests\guardarTorneoRequest;
use App\Http\Resources\EquipoResource;
use App\Http\Resources\PartidoResource;
use App\Http\Resources\TorneoResource;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaTorneos = Torneo::all();
        return TorneoResource::collection($listaTorneos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(guardarTorneoRequest $request)
    {
        $torneo = Torneo::create($request->all());
        return (new TorneoResource($torneo))->additional(['mensaje' => 'Torneo guardado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show(Torneo $torneo)
    {
        return new TorneoResource($torneo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Torneo $torneo)
    {
        $torneo->update($request->all());
        return (new TorneoResource($torneo))->additional(['mensaje' => 'Torneo actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Torneo $torneo)
    {
        $torneo->delete();
        return (new TorneoResource($torneo))->additional(['mensaje' => 'Torneo eliminado']);
    }

    public function showEquiposTorneo(Torneo $torneo)
    {
        $listaEquipos = $torneo->equipos->where('aprobado_equi', true);
        $listaEquiposData = EquipoResource::collection($listaEquipos);
        return $listaEquiposData;
    }

    public function showEquiposPreInscritos(Torneo $torneo)
    {
        $listaEquipos = $torneo->equipos->where('aprobado_equi', false);
        return EquipoResource::collection($listaEquipos);
    }

    public function showPartidosTorneo(Torneo $torneo)
    {
        $listaEquipos = $torneo->equipos->where('aprobado_equi', true);
        $listaPartidosTorneo = collect([]);
        foreach ($listaEquipos as $equipo) {
            $dataEquipo = $equipo->equipoData;
            if (!$dataEquipo == null) {
                $listaPartidos = $dataEquipo->partidos()->get();
                $listaPartidosTorneo = $listaPartidosTorneo->merge($listaPartidos);
            }
        }
        $listaPartidosUnicos = $listaPartidosTorneo->unique('cod_part');
        return PartidoResource::collection($listaPartidosUnicos);
    }
}

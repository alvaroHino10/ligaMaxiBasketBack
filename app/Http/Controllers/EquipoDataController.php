<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoDataRequest;
use App\Http\Resources\EquipoDataResource;
use Illuminate\Http\Request;
use App\Models\EquipoData;

class EquipoDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EquipoDataResource::collection(EquipoData::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipoDataRequest $request)
    {
        //
        $equipo_data = EquipoData::create($request->all());
        return (new EquipoDataResource($equipo_data))->additional(['mensaje' => 'Datos de equipo guardado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EquipoData $equipo_datum)
    {
        //
        return new EquipoDataResource($equipo_datum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipoDataRequest $request, EquipoData $equipo_datum)
    {
        //
        $equipo_datum->update($request->all());
        return (new EquipoDataResource($equipo_datum))->additional(['mensaje' => 'Datos del equipo actualizados correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipoData $equipo_datum)
    {
        //
        $equipo_datum->delete();
        return (new EquipoDataResource($equipo_datum))->additional(['mensaje' => 'Datos de equipo eliminados']);
    }
}

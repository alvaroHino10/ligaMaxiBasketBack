<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarControlPartidoRequest;
use App\Http\Resources\ControlPartidoResource;
use App\Models\ControlPartido;
use Illuminate\Http\Request;

class ControlPartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaControlPartido = ControlPartido::all();
        return ControlPartidoResource::collection($listaControlPartido);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarControlPartidoRequest $request) 
    {
        $controlPartido = ControlPartido::create($request->all());
        return (new ControlPartidoResource($controlPartido))->additional(['mensaje' => $request->rol_contr_part.' guardado correctamente']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ControlPartido $contPart)
    {
        return new ControlPartidoResource($contPart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarControlPartidoRequest $request, ControlPartido $ctrlPart)
    {
        $ctrlPart->update($request->all());
        return (new ControlpartidoResource($ctrlPart))->
            additional(['mensaje' => 'Datos del '.$ctrlPart->rol_contr_part.' actualizados correctamente']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Controlpartido $ctrlPart)
    {
        $ctrlPart->delete();
        return (new ControlPartidoResource($ctrlPart))->
            additional(['mensaje' => $ctrlPart->rol_contr_part.' eliminado']);
    }
}

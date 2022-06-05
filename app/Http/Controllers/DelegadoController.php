<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarDelegadoRequest;
use App\Http\Resources\DelegadoResource;
use App\Http\Resources\PreInscripcionResource;
use App\Models\Delegado;
use Illuminate\Http\Request;

class DelegadoController extends Controller
{
    /**
     * Muestra un listado de todos los registros de la tabla.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDelegados = Delegado::all();
        //return response($listaDelegados);
        return PreInscripcionResource::collection(($listaDelegados)); 
    }

    /**
     * Permite crear y guardar un nuevo registro en la tabla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarDelegadoRequest $request)
    {
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Delegado guardado correctamente'
        //],201);
        Delegado::create($request->all());
        return (new DelegadoResource(Delegado::create($request->all()))) ->additional(['mensaje' => 'Delegado guardado correctamente']);
    }

    /**
     * Permite mostrar los datos de un especifico registro con la respectiva id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Delegado $delegado)
    {
        //$delegado = Delegado::find($id);
        //return response()->json([
        //    'confirmacion' => true,
        //    'delegado' => $delegado
        //],200);
        return new DelegadoResource($delegado);
    }

    /**
     * Permite actulizar los datos del registro relacionado a la variable id de la tabla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarDelegadoRequest $request, Delegado $delegado)
    {
        //$delegado = Delegado::find($id)->update($request->all());
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Datos del delegado actualizados correctamente'
        //],201);
        $delegado->update($request->all());
        return (new DelegadoResource($delegado))->
            additional(['mensaje' => 'Datos del delegado actualizados correctamente']);
    }

    /**
     * Elimina el registro con el codigo id de la tabla.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegado $delegado)
    {
        //$delegado = Delegado::find($id)->delete();
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Delegado eliminado'
        //],200);
        $delegado->delete();
        return (new DelegadoResource($delegado))->
            additional(['mensaje' => 'Delegado eliminado']);
    }
}

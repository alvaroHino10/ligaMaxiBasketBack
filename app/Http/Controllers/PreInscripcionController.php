<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarPreInscripcionRequest;
use App\Models\PreInscripcion;

class PreInscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPreInscripciones = PreInscripcion::all();
        return response($listaPreInscripciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPreInscripcionRequest $request)
    {
        PreInscripcion::create($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Pre inscripcion guardada con exito',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preInscripcion = PreInscripcion::find($id);
        return response()->json([
            'confirmacion' => true,
            'pre inscripcion' => $preInscripcion
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarPreInscripcionRequest $request, $id)
    {
        $preInscripcion = PreInscripcion::find($id)->update($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Datos de la preinscripcion actualizados correctamente'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preInscripcion = PreInscripcion::find($id)->delete();
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Pre inscripcion eliminada'
        ], 200);
    }
}

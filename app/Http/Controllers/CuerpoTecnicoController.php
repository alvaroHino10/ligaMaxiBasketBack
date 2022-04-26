<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarCuerpoTecnicoRequest;
use App\Http\Requests\GuardarCuerpoTecnicoRequest;
use App\Models\CuerpoTecnico;
use Illuminate\Http\Request;

class CuerpoTecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCuerpoTecnico = CuerpoTecnico::all();
        return response($listaCuerpoTecnico);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarCuerpoTecnicoRequest $request)
    {
        CuerpoTecnico::create($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Personal del cuerpo tecnico guardado correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuerpoTecnico = CuerpoTecnico::find($id);
        return response()->json([
            'confirmacion' => true,
            'cuerpotecnico' => $cuerpoTecnico
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCuerpoTecnicoRequest $request, $id)
    {
        $cuerpoTecnico = CuerpoTecnico::find($id)->update($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Datos del cuerpo tecnico actualizados correctamente'
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuerpoTecnico = CuerpoTecnico::find($id)->delete();
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Personal del cuerpo tecnico eliminado'
        ],200);
    }
}

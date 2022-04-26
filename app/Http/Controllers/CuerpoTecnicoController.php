<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarCuerpoTecnicoRequest;
use App\Http\Requests\GuardarCuerpoTecnicoRequest;
use App\Models\CuerpoTecnico;
use Illuminate\Http\Request;

class CuerpoTecnicoController extends Controller
{
    /**
     * Muestra un listado de todos los registros de la tabla.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $listaCuerpoTecnico = CuerpoTecnico::all();
        return response($listaCuerpoTecnico);
    }

    /**
     * Permite crear y guardar un nuevo registro en la tabla.
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
        ],201);
    }

    /**
     * Permite mostrar los datos de un especifico registro con la respectiva id
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
     * Permite actulizar los datos del registro relacionado a la variable id de la tabla.
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
        ],201);
        
    }

    /**
     * Elimina el registro con el codigo id de la tabla.
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

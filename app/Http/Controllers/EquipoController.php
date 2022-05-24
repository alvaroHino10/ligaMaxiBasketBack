<?php

namespace App\Http\Controllers;


use App\Http\Requests\GuardarEquipoRequest;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Muestra un listado de todos los registros de la tabla.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaEquipos = Equipo::all();
        return response($listaEquipos);
    }

    /**
     * Permite crear y guardar un nuevo registro en la tabla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarEquipoRequest $request)
    {
        $codTorneoEquipoIngresado = $request->cod_torn;
        $nombreEquipoIngresado = $request->nombre_equi;
        $equipo_existente = Torneo::find($codTorneoEquipoIngresado)->equipos()
                        ->where('nombre_equi',$nombreEquipoIngresado)->first();
        if($equipo_existente == null){
            Equipo::create($request->all());
            $confirmacion = true;
            $mensaje = 'Equipo guardado correctamente';
            $solicitud = 201;
        }else{
            $confirmacion = false;
            $mensaje = 'Este nombre de equipo ya fue registrado anteriormente';
            $solicitud = 401;
        }
            return response()->json([
                'confirmacion' => $confirmacion,
                'mensaje' => $mensaje
            ],$solicitud); 
    }

    /**
     * Permite mostrar los datos de un especifico registro con la respectiva id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);
        return response()->json([
            'confirmacion' => true,
            'cuerpotecnico' => $equipo
        ],200);
    }

    /**
     * Permite actulizar los datos del registro relacionado a la variable id de la tabla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarEquipoRequest $request, $id)
    {
        $equipo = Equipo::find($id)->update($request->all());
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Datos del equipo actualizados correctamente'
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
        $equipo = Equipo::find($id)->delete();
        return response()->json([
            'confirmacion' => true,
            'mensaje' => 'Equipo eliminado'
        ],200);
    }
}

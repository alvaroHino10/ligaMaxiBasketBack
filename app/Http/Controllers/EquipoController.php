<?php

namespace App\Http\Controllers;


use App\Http\Requests\GuardarEquipoRequest;
use App\Http\Resources\EquipoResource;
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
        return EquipoResource::collection($listaEquipos);
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
            $equipo = Equipo::create($request->all());
            //Equipo::create($request->all());
            $confirmacion = true;
            $mensaje = 'Equipo registrado correctamente';
            $solicitud = 201;
        }else{
            $confirmacion = false;
            $mensaje = 'Este equipo ya fue registrado anteriormente';
            $solicitud = 401;
        }
            //return response()->json([
            //    'confirmacion' => $confirmacion,
            //    'mensaje' => $mensaje
            //],$solicitud); 
        return (new EquipoResource($equipo))
            ->additional(['confirmacion' => $confirmacion,
                        'mensaje' => $mensaje])
            ->response()
            ->setStatusCode($solicitud);
    }

    /**
     * Permite mostrar los datos de un especifico registro con la respectiva id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //$equipo = Equipo::find($id);
        //return response()->json([
        //    'confirmacion' => true,
        //    'cuerpotecnico' => $equipo
        //],200);
        return (new EquipoResource($equipo))
            ->additional(['confirmacion' => true]);
    }

    /**
     * Permite actulizar los datos del registro relacionado a la variable id de la tabla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarEquipoRequest $request, Equipo $equipo)
    {
        //$equipo = Equipo::find($id)->update($request->all());
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Datos del equipo actualizados correctamente'
        //],201);
        $equipo->update($request->all());
        return (new EquipoResource($equipo))->
            additional(['confirmacion' => true,
                        'mensaje' => 'Datos del equipo actualizados correctamente']);
    }

    /**
     * Elimina el registro con el codigo id de la tabla.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //$equipo = Equipo::find($id)->delete();
        //return response()->json([
        //    'confirmacion' => true,
        //   'mensaje' => 'Equipo eliminado'
        //],200);
        $equipo->delete();
        return (new EquipoResource($equipo))->
            additional(['confirmacion' => true,
                        'mensaje' => 'Equipo eliminado']);
    }
}

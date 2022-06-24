<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarJugadorRequest;
use App\Http\Resources\JugadorResource;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugador = Jugador::all();
        //return response($jugador, 200);
        return JugadorResource::collection($jugador);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarJugadorRequest $request)
    {
        $codEquipoDelJugadorIngresado = $request->cod_equi;
        $torneo = Equipo::firstWhere('cod_equi', $codEquipoDelJugadorIngresado);
        $codTorneoDelEquipoIngresado = $torneo['cod_torn'];

        $numIdenJugadorIngresado = $request->num_iden_jug;
        $nacionJugadorIngresado = $request->nacion_jug;

        $listaEquipos = Torneo::find($codTorneoDelEquipoIngresado)->equipos()->get();
        $existe = false;
        foreach ($listaEquipos as $equipo) {
            $listaJugadores = $equipo->jugadores()->get();
            /*$existe = $listaJugadores->contains(['num_iden_jug' => $numIdenJugadorIngresado,
                                                 'nacion_jug' => $nacionJugadorIngresado]);*/
            foreach ($listaJugadores as $jugador) {
                if ($jugador->num_iden_jug == $numIdenJugadorIngresado &&
                    $jugador->nacion_jug == $nacionJugadorIngresado && !$existe) {
                    $existe = true;
                }
            }
        }
        if (!$existe) {
            $data      = $request->all();
            if ($request->hasFile('link_img_jug') && $request->file('link_img_jug')->isValid()) {
                $file      = $request->file('link_img_jug');
                $filename  = $file->hashName();
                $extension = $file->extension();
                $picture   = str_replace(' ', '_', $filename) . '-' . rand() . '_' . time() . '.' . $extension;
                $path      = $file->storeAs('public/jugadores', $picture);
                $data['link_img_jug'] = $picture;
            }
            //Jugador::create($data);
            $resgistrado = Jugador::create($data);
            $confirmacion = true;
            $mensaje = 'Jugador registrado correctamente';
            $solicitud = 201;
        } else {
            $confirmacion = false;
            $mensaje = 'Este jugador ya fue registrado anteriormente';
            $solicitud = 401;
        }
        //return response()->json([
        //    'confirmacion' => $confirmacion,
        //    'mensaje' => $mensaje
        //], $solicitud);
        return (new JugadorResource($resgistrado))
            ->additional(['confirmacion' => $confirmacion,
                        'mensaje' => $mensaje])
            ->response()
            ->setStatusCode($solicitud);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        //$jugador = Jugador::find($id);
        $nombre_archivo = $jugador['link_img_jug'];
        $jugador['link_img_jug'] = asset(Storage::url('public/jugadores/'.$nombre_archivo));
        //return response()->json([
        //    'confirmacion' => true,
        //    'jugador' => $jugador
        //], 200);
        return (new JugadorResource($jugador))
            ->additional(['confirmacion' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarJugadorRequest $request, Jugador $jugador)
    {
        //$jugador = Jugador::find($id)->update($request->all());
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Datos del jugador actualizados correctamente'
        //], 201);
        $jugador->update($request->all());
        return (new JugadorResource($jugador))
            ->additional(['confirmacion' => true, 
                        'mensaje' => 'Datos del jugador actualizados correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        //$jugador = Jugador::find($id)->delete();
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Jugador eliminado'
        //], 200);
        $jugador->delete();
        return (new JugadorResource($jugador))
            ->additional(['confirmacion' => true, 
                        'mensaje' => 'Jugador eliminado']);
    }
}

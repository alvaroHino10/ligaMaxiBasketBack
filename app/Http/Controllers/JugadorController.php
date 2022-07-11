<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarJugadorRequest;
use App\Http\Resources\EstadisticasResource;
use App\Http\Resources\JugadorResource;
use App\Models\EquipoData;
use App\Models\Estadisticas;
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
        $existe = false;
        $codEquipoDataDelJugadorIngresado = $request->cod_equi_data;
        $equipoDataJugador = EquipoData::find($codEquipoDataDelJugadorIngresado);
        if($equipoDataJugador->cant_jug_equip < 15){
            $equipoJugador = $equipoDataJugador->equipo;

            $torneo = $equipoJugador->torneo;
            $listaEquipos = $torneo->equipos->where('aprobado_equi', true);

            $numIdenJugadorIngresado = $request->num_iden_jug;
            $nacionJugadorIngresado = $request->nacion_jug;
            foreach($listaEquipos as $equipo){
                $listaJugadores = $equipo->equipoData->jugadores;
                $jugadorExistente = $listaJugadores->where('num_iden_jug', $numIdenJugadorIngresado)
                                        ->where('nacion_jug', $nacionJugadorIngresado);
                if(!$jugadorExistente->isEmpty()){  
                    $existe = true;
                    break;
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
                $registrado = Jugador::create($data);
                $equipoDataJugador->increment('cant_jug_equip',1);
                Estadisticas::create([
                    'cod_jug' => $registrado->cod_jug
                ]);
                return (new JugadorResource($registrado))
                        ->additional(['confirmacion' => true,
                                    'mensaje' => 'Jugador registrado correctamente'])
                        ->response()
                        ->setStatusCode(201);
            } else {
                return response()->json(['confirmacion' => false,
                                        'mensaje' => 'Este jugador ya fue registrado anteriormente'])
                    ->setStatusCode(401);
            }   
        }else{
            return response()->json(['confirmacion' => false,
                                        'mensaje' => 'Superó el limite máximo de jugadores inscritos'])
                    ->setStatusCode(401);
        }
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

    public function updateCanastaSimple(Jugador $jugador){
        $estadisticasJugador = $jugador->estadistica;
        $estadisticasJugador->increment('cant_cnsta_simple');
    }

    public function updateCanastaDoble(Jugador $jugador){
        $estadisticasJugador = $jugador->estadistica;
        $estadisticasJugador->increment('cant_cnsta_doble');
    }

    public function updateCanastaTriple(Jugador $jugador){
        $estadisticasJugador = $jugador->estadistica;
        $estadisticasJugador->increment('cant_cnsta_triple');
    }

    public function updateFaltas(Jugador $jugador){
        $estadisticasJugador = $jugador->estadistica;
        $estadisticasJugador->increment('faltas');
    }

    public function getEstadisticasJugador(Jugador $jugador){
        $estadisticasJugador = $jugador->estadistica;
        return new EstadisticasResource($estadisticasJugador);
    }
}

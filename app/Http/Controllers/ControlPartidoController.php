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
        $listaArbitros = ControlPartido::where('rol_contr_part', 'arbitro')->get()->toArray();
        $listaFiscales = ControlPartido::where('rol_contr_part', 'fiscal')->get()->toArray();
        $listaMesas = ControlPartido::where('rol_contr_part', 'mesa')->get()->toArray();
        $listaClasificadaControlPartido = ['arbitros' => $listaArbitros,
                                           'fiscales' => $listaFiscales,
                                           'mesas'    => $listaMesas];
        return response()->json($listaClasificadaControlPartido);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarControlPartidoRequest $request) 
    {
        $data      = $request->all();
        if ($request->hasFile('link_img_contr_part') && $request->file('link_img_contr_part')->isValid()) {
            $file      = $request->file('link_img_contr_part');
            $filename  = $file->hashName();
            $extension = $file->extension();
            $picture   = str_replace(' ', '_', $filename) . '-' . rand() . '_' . time() . '.' . $extension;
            $path      = $file->storeAs('public/control_partido', $picture);
            $data['link_img_contr_part'] = $picture;
        }
        $controlPartido = ControlPartido::create($data);
        return (new ControlPartidoResource($controlPartido))->additional(['mensaje' => $request->rol_contr_part.' registrado correctamente']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ControlPartido $control_partido)
    {
        return new ControlPartidoResource($control_partido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarControlPartidoRequest $request, ControlPartido $control_partido)
    {
        $control_partido->update($request->all());
        return (new ControlpartidoResource($control_partido))->
            additional(['mensaje' => 'Datos del '.$control_partido->rol_contr_part.' actualizados correctamente']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Controlpartido $control_partido)
    {
        $control_partido->delete();
        return (new ControlPartidoResource($control_partido))->
            additional(['mensaje' => $control_partido->rol_contr_part.' eliminado']);
    }
}

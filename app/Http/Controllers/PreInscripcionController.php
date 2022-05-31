<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarPreInscripcionRequest;
use App\Http\Resources\PreInscripcionResource;
use App\Models\PreInscripcion;
use Illuminate\Support\Facades\Storage;

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
        //return response($listaPreInscripciones);
        return PreInscripcionResource::collection($listaPreInscripciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPreInscripcionRequest $request)
    {
        $data = $request->all();
        if ($request-> hasFile('link_img_comprob') && $request->file('link_img_comprob')->isValid()){
            $file      = $request->file('link_img_comprob');
            $filename  = $file->hashName();
            $extension = $file->extension();
            $picture   = str_replace(' ', '_', $filename).'-'.rand().'_'.time().'.'.$extension;
            $path      = $file->storeAs('public/pre_inscripcion', $picture);
            $data['link_img_comprob'] = $picture;
        }
        //PreInscripcion::create($data);
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Preinscripcion guardada con exito',
        //], 201);
        return (new PreInscripcionResource(PreInscripcion::create($data))) -> additional(['mensaje' => 'Preinscripcion guardada con exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PreInscripcion $preInscripcion)
    {
        //$preInscripcion = PreInscripcion::find($id);
        //return response()->json([
        //    'confirmacion' => true,
        //    'pre inscripcion' => $preInscripcion
        //], 200);
        return new PreInscripcionResource($preInscripcion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarPreInscripcionRequest $request, PreInscripcion $preInscripcion)
    {
        $preInscripcion->update($request->all());
        //$preInscripcion = PreInscripcion::find($id)->update($request->all());
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Datos de la preinscripcion actualizados correctamente'
        //], 201);
        return (new PreInscripcionResource($preInscripcion)) -> 
            additional(['mensaje' => 'Datos de la preinscripcion actualizados correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreInscripcion $preInscripcion)
    {
        //$preInscripcion = PreInscripcion::find($id)->delete();
        //return response()->json([
        //    'confirmacion' => true,
        //    'mensaje' => 'Preinscripcion eliminada'
        //], 200);
        $preInscripcion->delete();
        return (new PreInscripcionResource($preInscripcion))->
            additional(['mensaje' => 'Preinscripcion eliminada']);
    }
}

<?php

namespace App\Http\Controllers;

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
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

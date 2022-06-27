<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TorneoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'cod_torn' => $this->cod_torn,
            'cod_organiz' => $this->cod_organiz,
            'nombre_torn' => $this->nombre_torn,
            'ciud_torn' => $this->ciud_torn,
            'pais_torn' => $this->pais_torn,
            'fecha_ini_torn' => $this->fecha_ini_torn,
            'fecha_fin_torn' => $this->fecha_fin_torn,
            'gestion_torn' => $this->gestion_torn,
            'fecha_ini_preinscrip' => $this->fecha_ini_preinscrip,
            'fecha_fin_preinscrip' => $this->fecha_fin_preinscrip,
            'equipos' => $this->equipos
        ];
    }
}

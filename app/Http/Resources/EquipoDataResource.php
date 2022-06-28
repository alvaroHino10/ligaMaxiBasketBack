<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipoDataResource extends JsonResource
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
            'cod_equi_data' => $this->cod_equi_data,
            'cod_equi' => $this->cod_equi,
            'pais_equi' => $this->pais_equi, 
            'discip_equi' => $this->discip_equi,
            'color_equi' => $this->color_equi,
            'jugadores' => $this->jugadores
        ];
    }
}

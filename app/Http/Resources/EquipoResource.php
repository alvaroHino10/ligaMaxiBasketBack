<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'cod_equi' => $this->cod_equi,
            'cod_torn' => $this->cod_torn,
            'cod_preinscrip' => $this->cod_preinscrip,
            'nombre_equi' => $this->nombre_equi,
            'categ_equi' => $this->categ_equi,
            'aprobado_equi' => $this->aprobado_equi,
            'equipo_data' => $this->when($this->equipoData !== null, $this->equipoData)
        ];
    }
}

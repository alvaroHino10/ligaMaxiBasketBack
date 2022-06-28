<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartidoResource extends JsonResource
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
            'cod_part' => $this->cod_part,
            'fecha_part'=> $this->fecha_part,
            'hora_ini_part'=> $this->hora_ini_part,
            'hora_fin_part'=> $this->hora_fin_part
        ];
    }
}

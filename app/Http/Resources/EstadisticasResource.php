<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstadisticasResource extends JsonResource
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
            'cant_canastas_simples' => $this->cant_cnsta_simple,
            'cant_canastas_dobles' => $this->cant_cnsta_doble,
            'cant_canastas_triples' => $this->cant_cnsta_triple,
            'cant_faltas' => $this->faltas
        ];
    }
}

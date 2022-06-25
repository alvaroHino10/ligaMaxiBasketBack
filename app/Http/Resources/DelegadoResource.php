<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DelegadoResource extends JsonResource
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
            'cod_deleg' => $this->cod_deleg,
            'nombre_deleg' => $this->nombre_deleg,
            'ap_deleg' => $this->ap_deleg,
            'num_iden_deleg' => $this->num_iden_deleg,
            'correo_deleg' => $this->correo_deleg,
            'telf_deleg' => $this->telf_deleg,
            'fecha_nac_deleg' => $this->fecha_nac_deleg,
            'sexo_deleg' => $this->sexo_deleg,
            'link_img_deleg' => $this->link_img_deleg
        ];
    }

    public function with($request){
        return ['confirmacion' => true];
    }
}

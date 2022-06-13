<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ControlPartidoResource extends JsonResource
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
            'cod_contr_part' => $this->cod_contr_part,
            'nombre_contr_part' => $this->nombre_contr_part,
            'prim_ap_contr_part' => $this->prim_ap_contr_part,
            'seg_ap_contr_part' => $this->seg_ap_contr_part,
            'num_iden_contr_part' => $this->num_iden_contr_part,
            'fecha_nac_contr_part' => $this->fecha_nac_contr_part,
            'link_img_contr_part' => $this->link_img_contr_part,
            'rol_contr_part' => $this->rol_contr_part,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JugadorResource extends JsonResource
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
            'cod_jug' => $this->cod_jug,
            'cod_equi' => $this->cod_equi,
            'nombre_jug' => $this->nombre_jug,
            'prim_ap_jug' => $this->prim_ap_jug,
            'seg_ap_jug' => $this->seg_ap_jug,
            'correo_jug' => $this->correo_jug,
            'num_iden_jug' => $this->num_iden_jug,
            'nacion_jug' => $this->nacion_jug,
            'est_civil_jug' => $this->est_civil_jug, 
            'fecha_nac_jug' => $this->fecha_nac_jug,
            'telf_jug' => $this->telf_jug,
            'sexo_jug' => $this->sexo_jug,
            'dom_jug' => $this->dom_jug,
            'num_equi_jug' => $this->num_equi_jug,
            'link_img_jug' => $this->link_img_jug,
            'fecha_preinscrip_jug' => $this->fecha_preinscrip_jug
        ];
    }

}

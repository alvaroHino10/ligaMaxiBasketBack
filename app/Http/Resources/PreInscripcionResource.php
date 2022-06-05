<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PreInscripcionResource extends JsonResource
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
            'cod_preinscrip' => $this->cod_preinscrip,
            'num_transfer_preinscrip' => $this->num_transfer_preinscrip,
            'costo_preinscrip' => $this->costo_preinscrip,
            'fecha_preinscrip' => $this->fecha_preinscrip,
            'link_img_comprob' => $this->link_img_comprob,
        ];
        //return parent::toArray($request);
    }

    public function with($request){
        return [
            'confirmacion' => true
        ];
    }


}

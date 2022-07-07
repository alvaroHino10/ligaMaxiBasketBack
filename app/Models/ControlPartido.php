<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPartido extends Model
{
    use HasFactory;
    protected $table = 'control_partido';
    protected $primaryKey = 'cod_contr_part';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'nombre_contr_part',
        'prim_ap_contr_part',
        'seg_ap_contr_part',
        'num_iden_contr_part',
        'telf_contr_part',
        'fecha_nac_contr_part',
        'link_img_contr_part',
        'rol_contr_part'
    ];

    //protected $touches = ['partidos'];

    public function partidos(){
        $this->belongsToMany(Partido::class, 'controla', 'cod_contr_part', 'cod_part')->withTimestamps();
    }
}

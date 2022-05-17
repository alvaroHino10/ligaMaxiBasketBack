<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugador';
    protected $primaryKey = 'cod_jug';
    protected $fillable = [
        'cod_equi',
        'nombre_jug',
        'prim_ap_jug',
        'seg_ap_jug',
        'correo_jug',
        'num_iden_jug',
        'nacion_jug',
        'est_civil_jug',
        'fecha_nac_jug',
        'telf_jug',
        'sexo_jug',
        'dom_jug',
        'num_equi_jug',
        'link_img_jug'
    ];
}

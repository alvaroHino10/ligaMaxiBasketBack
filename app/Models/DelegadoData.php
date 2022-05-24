<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelegadoData extends Model
{
    use HasFactory;

    protected $table = 'delegado_data';
    protected $primaryKey = 'cod_deleg_data';
    protected $fillable = [
        'num_iden_deleg_data',
        'fecha_nac_deleg_data', 
        'sexo_deleg_data',
        'link_img_deleg_data'
    ];
}

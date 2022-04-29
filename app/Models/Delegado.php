<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    use HasFactory;
    protected $table = 'delegado';
    protected $primaryKey = 'cod_deleg';
    public $timestamps = false;
    protected $fillable = [
        'cod_deleg',
        'cod_preinscrip',
        'nombre_deleg',
        'ap_delegado',
        'num_iden_deleg',
        'fecha_nac_delegado',
        'telf_deleg',
        'sexo_deleg',
        'link_img_deleg'
    ];
}

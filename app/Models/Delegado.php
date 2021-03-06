<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    use HasFactory;
    protected $table = 'delegado';
    protected $primaryKey = 'cod_deleg';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'nombre_deleg',
        'ap_deleg',
        'num_iden_deleg',
        'correo_deleg',
        'telf_deleg',
        'fecha_nac_deleg',
        'sexo_deleg',
        'link_img_deleg'
    ];

    public function preinscripciones(){
        return $this->hasMany(PreInscripcion::class,'cod_deleg');
    }
}

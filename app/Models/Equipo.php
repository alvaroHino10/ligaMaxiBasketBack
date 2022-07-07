<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';
    protected $primaryKey = 'cod_equi';  
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'cod_torn',
        'cod_preinscrip',
        'nombre_equi',
        'categ_equi',
        'aprobado_equi'
    ];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'cod_torn');
    }

    public function equipoData(){
        return $this->hasOne(EquipoData::class, 'cod_equi');
    }
}

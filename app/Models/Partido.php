<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = 'partido';
    protected $primaryKey = 'cod_part';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'fecha_part',
        'lugar_part',
        'hora_ini_part',
        'hora_fin_part'
    ];

    public function equipoDatas(){
        return $this->belongsToMany(EquipoData::class,'puntaje_partido_equipo','cod_part','cod_equi_data')
        ->withPivot('puntaje_periodo_1', 'puntaje_periodo_2','puntaje_periodo_3','puntaje_periodo_4','puntaje_tiempo_extra')
        ->withTimestamps();
    }

    public function controladoresPartido(){
        return $this->belongsToMany(ControlPartido::class,'controla','cod_part','cod_contr_part')->withTimestamps();
    }
}

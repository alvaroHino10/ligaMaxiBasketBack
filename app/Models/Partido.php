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
    //protected $touches = ['equipos','controladoresPartido'];

    public function equipos(){
        return $this->belongsToMany(Equipo::class,'puntaje_partido_equipo','cod_part','cod_equi_data')->using(PuntajePartidoEquipo::class)->withTimestamps();
    }

    /*public function equipos(){
        return $this->hasMany(PuntajePartidoEquipo::class, 'cod_part');
    }*/

    public function controladoresPartido(){
        return $this->belongsToMany(ControlPartido::class,'controla','cod_part','cod_contr_part')->withTimestamps();
    }
}

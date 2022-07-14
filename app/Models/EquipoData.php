<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoData extends Model
{
    use HasFactory;
    protected $table = 'equipo_data';
    protected $primaryKey = 'cod_equi_data';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'cod_equi',
        'pais_equi',
        'discip_equi',
        'color_equi'
    ];

    public function jugadores()
    {
        return $this->hasMany(Jugador::class, 'cod_equi_data');
    }

    public function equipo(){
        return $this->belongsTo(Equipo::class, 'cod_equi');
    }

    public function partidos(){
        return $this->belongsToMany(Partido::class,'puntaje_partido_equipo','cod_equi_data','cod_part')
        ->withPivot('puntaje_periodo_1', 'puntaje_periodo_2','puntaje_periodo_3','puntaje_periodo_4','puntaje_tiempo_extra')
        ->withTimestamps();
    }
}

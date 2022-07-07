<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PuntajePartidoEquipo extends Pivot
{
    use HasFactory;
    protected $table = 'puntaje_partido_equipo';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'cod_equi',
        'cod_part',
        'puntaje_periodo_1',
        'puntaje_periodo_2',
        'puntaje_periodo_3',
        'puntaje_periodo_4',
        'puntaje_tiempo_extra'
    ];
}

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
        'cod_torn',
        'fecha_part',
        'hora_ini_part',
        'hora_fin_part'
    ];

    public function equipos(){
        return $this->belongsToMany(Equipo::class,'puntaje_partido_equipo','cod_part','cod_equi');
    }
}

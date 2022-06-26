<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    protected $table = 'torneo';
    protected $primaryKey = 'cod_torn';  
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'cod_torn',
        'nombre_torn',
        'ciud_torn',
        'pais_torn',
        'fecha_ini_torn',
        'fecha_fin_torn',
        'gestion_torn',
        'fecha_ini_preinscrip',
        'fecha_fin_preinscrip'
    ];

    public function equipos(){
        return $this->hasMany(Equipo::class, 'cod_torn');
    }
    
    public function partidos(){
        return $this->hasMany(Partido::class, 'cod_torn');
    }
}

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';
    protected $primaryKey = 'cod_equi';  
    protected $fillable = [
        'cod_torn',
        'cod_preinscrip',
        'nombre_equi',
        'categ_equi',
        'pais_equi',
        'discip_equi',
        'color_equi'
    ];
}

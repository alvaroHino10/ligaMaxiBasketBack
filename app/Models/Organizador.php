<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;
    protected $table = 'organizador';
    protected $primaryKey = 'cod_organiz';  
    protected $fillable = [
        'cod_organiz',
        'nombre_organiz',
        'ap_organiz',
        'correo_organiz',
        'telf_organiz',
        'num_iden_organiz',
        'sexo_organiz'
    ];
}

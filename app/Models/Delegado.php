<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    use HasFactory;
    protected $table = 'delegado';
    protected $primaryKey = 'cod_deleg';
    protected $fillable = [
        'cod_deleg',
        'cod_preinscrip',
        'nombre_deleg',
        'ap_deleg',
        'correo_deleg',
        'telf_deleg',
    ];
}

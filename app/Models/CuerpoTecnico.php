<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuerpoTecnico extends Model
{
    use HasFactory;

    protected $table = 'cuerpotecnico';
    protected $primaryKey = 'codct';
    protected $fillable = [
        'nombrect',
        'apellidoct',
        'numidenct',
        'fechanacct',
        'telfct',
        'sexoct',
        'rolct',
        'linkimgct'
    ];
}

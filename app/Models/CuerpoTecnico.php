<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuerpoTecnico extends Model
{
    use HasFactory;

    protected $table = 'cuerpotecnico';
    protected $primaryKey = 'codct';
    public $timestamps = false;
    protected $fillable = [
        'nombrect',
        'apellidct',
        'numidenct',
        'fechanacct',
        'telfct',
        'sexoct',
        'rolct',
        'linkimgct'
    ];
}

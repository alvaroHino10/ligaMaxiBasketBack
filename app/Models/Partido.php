<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = 'partido';
    protected $primaryKey = 'cod_part';
    protected $fillable = [
        'cod_torn',
        'fecha_part',
        'hora_ini_part',
        'hora_fin_part'
    ];

    public function torneo(){
        return $this->belongsTo(Torneo::class, 'cod_torn');
    }
}

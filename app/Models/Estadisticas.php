<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadisticas extends Model
{
    use HasFactory;
    protected $table = 'estadisticas';
    protected $primaryKey = 'cod_estadist';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'cod_jug'
    ];

    public function jugador(){
        return $this->belongsTo(Jugador::class,'cod_jug');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugador';
    protected $primaryKey = 'codjug';
    public $timestamps = false;
    protected $fillable = [
        'nombrejug',
        'primapjug',
        'segapjug',
        'correojug',
        'numidentjug',
        'nacionjug',
        'estciviljug',
        'fechanacjug',
        'telfjug',
        'sexojug',
        'domjug',
        'numequijug',
        'linkimgjug'
    ];
}

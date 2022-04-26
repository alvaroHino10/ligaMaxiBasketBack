<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';
    protected $primaryKey = 'codequi';
    public $timestamps = false;
    protected $fillable = [
        'nombreequi',
        'categequi',
        'paisequi',
        'discipequi',
        'colorequi'
    ];
}

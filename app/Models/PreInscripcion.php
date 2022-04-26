<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreInscripcion extends Model
{
    use HasFactory;

    protected $table = 'preinscripcion';
    protected $primaryKey = 'codpreinscrip';
    public $timestamps = false;
    protected $fillable = [
        'codequi',
        'numtransfer',
        'costopreinscrip',
        'fechapreinscrip',
        'linkimgcomprob',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreInscripcion extends Model
{
    use HasFactory;

    protected $table = 'preinscripcion';
    protected $primaryKey = 'cod_preinscrip';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'cod_deleg',
        'num_transfer_preinscrip',
        'costo_preinscrip',
        'fecha_preinscrip',
        'link_img_comprob',
    ];

    public function delegado(){
        return $this->belongsTo(Delegado::class,'cod_deleg');
    }
}

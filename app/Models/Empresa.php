<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $fillable = [
        'nombre',
        'direccion',
        'representante_legal',
        'nit',
        'nic',
        'telefono',
        'correo',
        'pagina_web'
    ];

    public $timestamps = false;
}

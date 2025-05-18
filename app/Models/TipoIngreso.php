<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIngreso extends Model
{
    protected $table = 'tipo_ingreso';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
}

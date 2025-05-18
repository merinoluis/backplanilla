<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso';

    protected $fillable = [
        'empleado_id',
        'tipo_ingreso_id',
        'monto',
        'fecha'
    ];

    public $timestamps = false;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function tipoIngreso()
    {
        return $this->belongsTo(TipoIngreso::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    protected $table = 'planilla';

    protected $fillable = [
        'empleado_id',
        'fecha_corte',
        'sueldo_base',
        'horas_extras',
        'bonos',
        'vacaciones',
        'isss_empleado',
        'afp_empleado',
        'isr',
        'isss_patronal',
        'afp_patronal',
        'deposito_empleado',
        'total_aportes'
    ];

    public $timestamps = false;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}


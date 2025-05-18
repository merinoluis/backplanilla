<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuento';

    protected $fillable = [
        'empleado_id',
        'tipo_descuento_id',
        'monto',
        'fecha'
    ];

    public $timestamps = false;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function tipoDescuento()
    {
        return $this->belongsTo(TipoDescuento::class);
    }
}

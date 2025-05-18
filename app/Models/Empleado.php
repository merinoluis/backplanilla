<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profesion;
use App\Models\Sexo;
use App\Models\EstadoCivil;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'primernombre',
        'segundonombre',
        'primerapellido',
        'segundoapellido',
        'apellido_casada',
        'fechanacimiento',
        'sexo_id',
        'estado_civil_id',
        'tipo_documento_id',
        'numero_documento',
        'dui',
        'numero_nit',
        'isss',
        'numeroafiliado',
        'afp_tipo',
        'correo',
        'correo_institucional',
        'direccion',
        'departamento',
        'municipio',
        'tipo_contrato',
        'fechaingreso',
        'sueldo',
        'numerocuenta',
        'id_puesto',
        'id_subunidad',
        'profesion_id',
        'cargo',
        'jefe_id',
        'estado'
    ];

    public $timestamps = false;

    // Relaciones
    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'id_puesto');
    }

    public function subunidad()
    {
        return $this->belongsTo(Subunidad::class, 'id_subunidad');
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class, 'profesion_id');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'estado_civil_id');
    }
}

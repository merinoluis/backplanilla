
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaPago extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'salario_base', 'otros_ingresos', 'descuentos', 'salario_neto'];
}

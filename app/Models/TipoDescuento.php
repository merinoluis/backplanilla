<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDescuento extends Model
{
    protected $table = 'tipo_descuento';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function descuentos()
    {
        return $this->hasMany(Descuento::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carros';

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'color',
    ];

    public $timestamps = false; // ya que no hay created_at ni updated_at
}

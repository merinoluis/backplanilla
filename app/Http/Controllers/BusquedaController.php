<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class BusquedaController extends Controller
{
    public function buscar(Request $request)
    {
        $query = Empleado::query();

        if ($request->has('nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        if ($request->has('apellido')) {
            $query->where('apellido', 'like', '%' . $request->input('apellido') . '%');
        }

        if ($request->has('documento')) {
            $query->where('documento', $request->input('documento'));
        }

        if ($request->has('fecha_nacimiento')) {
            $query->where('fecha_nacimiento', $request->input('fecha_nacimiento'));
        }

        return $query->get();
    }
}

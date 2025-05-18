<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;

class IngresoController extends Controller
{
    public function index()
    {
        return Ingreso::with('empleado')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'tipo_ingreso_id' => 'required|exists:tipo_ingreso,id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $ingreso = Ingreso::create($validated);
        return response()->json($ingreso, 201);
    }
}

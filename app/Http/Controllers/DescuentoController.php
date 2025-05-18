<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descuento;

class DescuentoController extends Controller
{
    public function index()
    {
        return Descuento::with('empleado')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'tipo_descuento_id' => 'required|exists:tipo_descuento,id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $descuento = Descuento::create($validated);
        return response()->json($descuento, 201);
    }
}

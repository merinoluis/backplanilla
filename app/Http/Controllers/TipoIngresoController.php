<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoIngreso;

class TipoIngresoController extends Controller
{
    public function index()
    {
        return TipoIngreso::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:tipo_ingreso,nombre|max:100',
        ]);

        $tipoIngreso = TipoIngreso::create($validated);

        return response()->json($tipoIngreso, 201);
    }

    public function update(Request $request, $id)
    {
        $tipoIngreso = TipoIngreso::findOrFail($id);
        $tipoIngreso->update($request->only('nombre'));

        return response()->json($tipoIngreso);
    }

    public function destroy($id)
    {
        TipoIngreso::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}

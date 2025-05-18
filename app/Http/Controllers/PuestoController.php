<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;

class PuestoController extends Controller
{
    public function index()
    {
        return Puesto::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:puesto,nombre|max:100',
            'rango_minimo' => 'required|numeric|min:0',
            'rango_maximo' => 'required|numeric|min:0|gt:rango_minimo',
        ]);

        $puesto = Puesto::create($validated);
        return response()->json($puesto, 201);
    }

    public function update(Request $request, $id)
    {
        $puesto = Puesto::findOrFail($id);
        $puesto->update($request->only(['nombre', 'rango_minimo', 'rango_maximo']));

        return response()->json($puesto);
    }

    public function destroy($id)
    {
        Puesto::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

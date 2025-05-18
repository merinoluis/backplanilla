<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDescuento;

class TipoDescuentoController extends Controller
{
    public function index()
    {
        return TipoDescuento::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:tipo_descuento,nombre|max:100',
        ]);

        $tipoDescuento = TipoDescuento::create($validated);

        return response()->json($tipoDescuento, 201);
    }

    public function update(Request $request, $id)
    {
        $tipoDescuento = TipoDescuento::findOrFail($id);
        $tipoDescuento->update($request->only('nombre'));

        return response()->json($tipoDescuento);
    }

    public function destroy($id)
    {
        TipoDescuento::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}

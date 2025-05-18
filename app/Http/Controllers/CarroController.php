<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        return Carro::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer|min:1900|max:2100',
            'color' => 'nullable|string',
        ]);

        $carro = Carro::create($request->all());

        return response()->json($carro, 201);
    }

    public function show($id)
    {
        return Carro::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $carro = Carro::findOrFail($id);
        $carro->update($request->all());

        return response()->json($carro);
    }

    public function destroy($id)
    {
        Carro::destroy($id);
        return response()->json(['message' => 'Carro eliminado']);
    }
}

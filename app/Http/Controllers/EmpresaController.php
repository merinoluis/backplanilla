<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        return Empresa::first();
    }

    public function update(Request $request)
    {
        $empresa = Empresa::first();

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'representante_legal' => 'required|string|max:255',
            'nit' => 'required|string|max:20',
            'nic' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email',
            'pagina_web' => 'nullable|string|max:255',
        ]);

        if ($empresa) {
            $empresa->update($validated);
        } else {
            $empresa = Empresa::create($validated);
        }

        return response()->json($empresa);
    }
}

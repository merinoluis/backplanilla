<?php
namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return Empleado::with(['puesto', 'subunidad', 'profesion', 'sexo', 'estadoCivil'])->where('estado', 1)->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'primernombre' => 'required|string|max:50',
            'segundonombre' => 'nullable|string|max:100',
            'primerapellido' => 'required|string|max:100',
            'segundoapellido' => 'nullable|string|max:100',
            'apellido_casada' => 'nullable|string|max:100',
            'fechanacimiento' => 'required|date|before:-18 years',
            'sexo_id' => 'required|exists:sexo,id',
            'estado_civil_id' => 'required|exists:estado_civil,id',
            'tipo_documento_id' => 'required|exists:tipo_documento,id',
            'numero_documento' => 'required|string|max:20|unique:empleado',
            'dui' => 'required|string|size:10|unique:empleado',
            'numero_nit' => 'required|string|max:20|unique:empleado',
            'isss' => 'required|string|max:100|unique:empleado',
            'numeroafiliado' => 'required|string|max:25|unique:empleado',
            'afp_tipo' => 'required|string|max:100',
            'correo' => 'required|email|unique:empleado',
            'correo_institucional' => 'nullable|email|unique:empleado',
            'direccion' => 'required|string',
            'departamento' => 'required|string|max:100',
            'municipio' => 'required|string|max:100',
            'tipo_contrato' => 'required|string|max:100',
            'fechaingreso' => 'required|date',
            'sueldo' => 'required|numeric|min:0',
            'numerocuenta' => 'required|string|max:25',
            'id_puesto' => 'required|exists:puesto,id',
            'id_subunidad' => 'required|exists:subunidad,id',
            'profesion_id' => 'required|exists:profesion,id',
            'cargo' => 'nullable|string|max:100',
            'jefe_id' => 'nullable|exists:empleado,id',
            'estado' => 'integer'
        ]);

        $empleado = Empleado::create($validated);
        return response()->json($empleado, 201);
    }

    public function show($id)
    {
        return Empleado::with(['puesto', 'subunidad', 'profesion'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return response()->json(null, 204);
    }
}

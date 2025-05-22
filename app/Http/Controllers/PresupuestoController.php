<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuesto;

class PresupuestoController extends Controller
{
    public function index()
    {
        return Presupuesto::all();
    }

    public function show($id)
    {
        return Presupuesto::find($id);
    }

    public function store(Request $request)
    {
        return Presupuesto::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->update($request->all());

        return $presupuesto;
    }

    public function delete(Request $request, $id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->delete();

        return 204;
    }
}

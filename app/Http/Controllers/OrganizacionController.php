<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;

class OrganizacionController extends Controller
{
    public function index()
    {
        return Organizacion::all();
    }

    public function show($id)
    {
        return Organizacion::find($id);
    }

    public function store(Request $request)
    {
        return Organizacion::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $organizacion = Organizacion::findOrFail($id);
        $organizacion->update($request->all());

        return $organizacion;
    }

    public function delete(Request $request, $id)
    {
        $organizacion = Organizacion::findOrFail($id);
        $organizacion->delete();

        return 204;
    }
}

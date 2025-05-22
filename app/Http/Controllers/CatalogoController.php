<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;

class CatalogoController extends Controller
{
    public function index()
    {
        return Catalogo::all();
    }

    public function show($id)
    {
        return Catalogo::find($id);
    }

    public function store(Request $request)
    {
        return Catalogo::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $catalogo = Catalogo::findOrFail($id);
        $catalogo->update($request->all());

        return $catalogo;
    }

    public function delete(Request $request, $id)
    {
        $catalogo = Catalogo::findOrFail($id);
        $catalogo->delete();

        return 204;
    }
}

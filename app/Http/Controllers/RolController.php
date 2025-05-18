
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function index()
    {
        return Rol::all();
    }

    public function show($id)
    {
        return Rol::find($id);
    }

    public function store(Request $request)
    {
        return Rol::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());

        return $rol;
    }

    public function delete(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();

        return 204;
    }
}

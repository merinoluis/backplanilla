
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privilegio;

class PrivilegioController extends Controller
{
    public function index()
    {
        return Privilegio::all();
    }

    public function show($id)
    {
        return Privilegio::find($id);
    }

    public function store(Request $request)
    {
        return Privilegio::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->update($request->all());

        return $privilegio;
    }

    public function delete(Request $request, $id)
    {
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->delete();

        return 204;
    }
}

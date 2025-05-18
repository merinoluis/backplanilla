
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoletaPago;

class BoletaPagoController extends Controller
{
    public function index()
    {
        return BoletaPago::all();
    }

    public function show($id)
    {
        return BoletaPago::find($id);
    }

    public function store(Request $request)
    {
        return BoletaPago::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $boletaPago = BoletaPago::findOrFail($id);
        $boletaPago->update($request->all());

        return $boletaPago;
    }

    public function delete(Request $request, $id)
    {
        $boletaPago = BoletaPago::findOrFail($id);
        $boletaPago->delete();

        return 204;
    }
}

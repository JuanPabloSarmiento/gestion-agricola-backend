<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use Illuminate\Http\Request;

class CultivoController extends Controller
{
    public function index()
    {
        return Cultivo::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'nullable|string',
            'fecha_siembra' => 'required|date',
            'estado' => 'nullable|string'
        ]);

        return Cultivo::create($data);
    }

    public function show($id)
    {
        return Cultivo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cultivo = Cultivo::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'string',
            'tipo' => 'string|nullable',
            'fecha_siembra' => 'date',
            'estado' => 'string'
        ]);

        $cultivo->update($data);

        return $cultivo;
    }

    public function destroy($id)
    {
        $cultivo = Cultivo::findOrFail($id);
        $cultivo->delete();

        return response()->json(['message' => 'Cultivo eliminado']);
    }
}

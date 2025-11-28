<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AplicacionInsumo;

class AplicacionInsumoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cultivo_id' => 'nullable|exists:cultivos,id',
            'animal_id'  => 'nullable|exists:animales,id',
            'fecha'      => 'required|date',
            'producto'   => 'required|string',
            'dosis'      => 'required|string'
        ]);

        $aplicacion = AplicacionInsumo::create($validated);

        return response()->json([
            'message' => 'Aplicación registrada correctamente',
            'data' => $aplicacion
        ], 201);
    }

    public function index()
    {
        return AplicacionInsumo::with(['cultivo', 'animal'])->get();
    }
}
